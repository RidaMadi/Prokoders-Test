<?php


namespace App\Http\Services;


use App\Http\Repository\FileOperationRepository;
use App\Http\Repository\FileRepository;
use App\Http\Repository\HistoryRepository;
use App\Http\Requests\deleteFileRequest;
use App\Http\Requests\FileOperationRequest;
use App\Http\Requests\saveFileRequest;
use App\Http\Utiles\GETFile;
use App\Http\Utiles\UploadFile;
use App\Traits\GeneralTrait;
use Tymon\JWTAuth\Facades\JWTAuth;

class FileOperationServices
{
    use GeneralTrait;
    private $repo, $repoF ,$history;

    public function __construct(FileOperationRepository $fileOperations, FileRepository $fileRepository,HistoryRepository $historyRepository)
    {
        $this->repo = $fileOperations;
        $this->repoF = $fileRepository;
        $this->history = $historyRepository;
    }
    public function check_in(FileOperationRequest $request)
    {
        $validated = $request->validated();

        if ($this->repo->checkStateFiles($validated['file_ids'])) {
            return $this->returnError(403, 'A reserved file cannot be reserved');
        }

        $user = JWTAuth::parseToken()->authenticate();

        $file = $this->repo->check_in($validated['file_ids'], $validated['group_id'], $user->id);

        for ($i = 0; $i < sizeof($validated['file_ids']); $i++) {
            $this->history->addOperation($file[$i], 'check_in', $user->id);
        }
        return $this->returnSuccessMessage('check_in successfully');
    }

    public function readFile(deleteFileRequest $request)
    {
        $validated = $request->validated();
        $user = JWTAuth::parseToken()->authenticate();
        if (!$this->repoF->checkStateFile($validated['file_id'],$user->id)->isEmpty()) {
            return $this->returnError(403, 'can not be read now');
        }

        $user = JWTAuth::parseToken()->authenticate();
        $file = GETFile::get($validated['file_id'], 'files');
        $this->history->addOperation($validated['file_id'], 'read', $user->id);
        return $this->returnData('Data', $file);
    }

    public function saveFile(saveFileRequest $request)
    {
        $validated = $request->validated();
        $user = JWTAuth::parseToken()->authenticate();

        if ($this->repoF->checkStateFileUser($validated['file_id'],$user->id)->isEmpty()) {
            return $this->returnError(403, 'can not be save now');
        }

        $name = $request->file('path')->getClientOriginalName();

        UploadFile::delete($name, 'files');
        UploadFile::upload($request->file('path'), 'files');
        $this->history->addOperation($validated['file_id'], 'save', $user->id);
        return $this->returnSuccessMessage('saved successfully');
    }

    public function check_outFile(deleteFileRequest $request){
        $validated = $request->validated();
        $user = JWTAuth::parseToken()->authenticate();

        if ($this->repoF->checkStateFileUser($validated['file_id'],$user->id)->isEmpty()) {
            return $this->returnError(403, 'can not check_out');
        }

        $this->repoF->check_outFile($validated['file_id'],$user->id);

        $this->history->addOperation($validated['file_id'], 'check_out', $user->id);
        return $this->returnSuccessMessage('check_out successfully');
    }

}
