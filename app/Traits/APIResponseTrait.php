<?php

namespace App\Traits;
use App\Services\Response\APIResponse;
use Illuminate\Database\Eloquent\Model;
use ReflectionClass;
use Validator;

trait APIResponseTrait
{
	
    public function success(array $data, $code = 200)
    {

        
        $response = (new APIResponse)->success($data);

        return response()->json($response, $code);

    }

    public function error($message, $code = 422)
    {
        
        $response = (new APIResponse)->error($message);

        return response()->json($response, $code);

    }


    public function handleValidation($data){

        $validator = Validator::make(request()->all(), $data);

        if ($validator->fails()){
        
            $response = $validator->errors();
            return $this->error($response, 422);
        }
        
    }

    public function notFoundResponse(){

        return $this->error(static::getModelName().' details not found.', 402);
    }


    public function handleDelete($model){

        if (!$model) {
            return $this->notFoundResponse();
        }

        $model->delete();

        return $this->success([
            'msg' => static::getModelName().' successfully deleted.'
        ]);

    }

    public function handleShow($model){

        if (!$model) {
            return $this->notFoundResponse();
        }

        return $this->success([strtolower(static::getModelName()) => $model]);

    }

    public function handleUpdateResponse(Model $model){
        $data = [
            strtolower(static::getModelName()) => $model,
            'msg' => static::getModelName().' successfully updated.'
        ];
        
        return $this->success($data);
    }

    public function handleUpdateArrayResponse(array $data){
    	
        $data['msg'] = static::getModelName().' successfully updated.';
        
        return $this->success($data);
    }

    public function handleAddResponse(Model $model){
        $data = [
            strtolower(static::getModelName()) => $model,
            'msg' => static::getModelName().' successfully added.'
        ];
        
        return $this->success($data);
    }

    public function handleAddArrayResponse(array $data){
        $data['msg'] = static::getModelName().' successfully added.';
        
        return $this->success($data);
    }

    protected static function getModelName(){

        if(isset(static::$modelName)){

            return static::$modelName;
        }
        $subject = (new ReflectionClass(get_called_class()))->getShortName();

        return strstr($subject, 'Controller', true);
    }

}