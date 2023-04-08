<?php


namespace App\Http\Services;


use App\Http\Repository\DisplayRepository;
use App\Http\Repository\FileRepository;
use App\Http\Repository\GroupRepository;
use App\Http\Requests\deleteFileRequest;
use App\Http\Requests\DeleteGroupRequest;
use App\Http\Requests\GetAllUserInGroupRequest;
use App\Traits\GeneralTrait;
use Tymon\JWTAuth\Facades\JWTAuth;

class DisplayService
{
    use GeneralTrait;

    private $repo, $file, $group;

    public function __construct(DisplayRepository $displayRepository, FileRepository $file, GroupRepository $groupRepository)
    {
        $this->repo = $displayRepository;
        $this->file = $file;
        $this->group = $groupRepository;
    }

    public function getMyFile()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $data =  $this->repo->getMyFile($user->id);
        return $this->returnData('Data', $data);
    }

    public function getMyGroup()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $data =  $this->repo->getMyGroup($user->id);
        return  $this->returnData('Data', $data);
    }

    public function getGroupFile(DeleteGroupRequest $request)
    {
        $validated = $request->validated();
        $data = $this->repo->getGroupFile($validated['group_id']);
        return $this->returnData('Data', $data);
    }
    public function getAllUserInSystem()
    {
        $data = $this->repo->getAllUserInSystem();
        return $this->returnData('Data', $data);
    }

    public function checkStateFile(deleteFileRequest $request)
    {
        $validated = $request->validated();
        return $this->file->checkStateFile($validated['file_id']);
    }
    public function getUserCheck_In(deleteFileRequest $request)
    {
        $validated = $request->validated();
        return $this->file->getUserCheck_In($validated['file_id']);
    }

    public function getAllUserInGroup(GetAllUserInGroupRequest $allUserInGroupRequest){
        $validated = $allUserInGroupRequest->validated();
        $data = $this->group->getAllUserInGroup($validated['group_id']);
        return $this->returnData('Data', $data);
    }

    public function getAllFileCheck_InGroupForUser(GetAllUserInGroupRequest $request){
        $validated = $request->validated();
        $user = JWTAuth::parseToken()->authenticate();
        $data = $this->file->getAllFileCheck_InGroupForUser($validated['group_id'],$user->id);
        return $this->returnData('Data', $data);
    }
}
