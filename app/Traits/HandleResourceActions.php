<?php

namespace App\Traits;

trait HandleResourceActions
{
    protected function modelName():string
    {
        return $this->modelName ?? null;
    }


    /**
     * Handles the creation of a new resource.
     *
     * This method attempts to create a new instance of the model using the provided data.
     * Returns a success response if the creation was successful, or an error response otherwise.
     *
     * @param array $data The data to be used for creating the resource
     * @return mixed Success or error response
     * @throws \Exception When an error occurs during resource creation
     */
    public function handleStore($data)
    {
        try {
            if (!$this->model::create($data)) {
                return $this->handleError('Oops! Sorry, unable to create new' . $this->modelName());
            }

            return $this->handleSuccess('Bingo! New ' . $this->modelName() . ' created successfully');
        } catch (\Exception $e) {
            return $this->handleError($e->getMessage());
        }
    }


    /**
     * Handle the update operation for a model.
     *
     * This method attempts to update the given model with validated request data.
     * It returns appropriate success or error responses based on the operation outcome.
     *
     * @param \Illuminate\Http\Request $request The request containing validated data
     * @param \Illuminate\Database\Eloquent\Model $model The model to update
     * @return mixed Returns either a success or error response
     * @throws \Illuminate\Validation\ValidationException If validation fails
     * @throws \Exception If any error occurs during the update operation
     */
    public function handleUpdate($request, $model)
    {
        try {

            $this->model->where('subscriber_id', session('active_subscriber'))
                ->where($this->model->getKeyName(), $model->{$this->model->getKeyName()})
                ->update($request->validated());

            return $this->handleSuccess('Bingo! '.$this->modelName() . ' updated successfully');

        } catch (\Exception $e) {
            return $this->handleError($e->getMessage());
        }

    }

    /**
     * Handle the deletion of a model instance.
     *
     * This method attempts to delete the given model and returns an appropriate response.
     * If the deletion is successful, a success response is returned.
     * If the deletion fails, an error response is returned.
     * Any exceptions thrown during the process are caught and returned as error responses.
     *
     * @param mixed $model The model instance to delete
     * @return mixed Returns either a success or error response
     * @throws \Exception Caught internally and converted to error response
     */
    public function handleDelete($model)
    {
        try {

            $this->model->where('subscriber_id', session('active_subscriber'))
                ->where($this->model->getKeyName(), $model->{$this->model->getKeyName()})
                ->delete();


            return $this->handleSuccess('Bingo! '. $this->modelName() . ' deleted successfully');

        } catch (\Exception $e) {
            return $this->handleError($e->getMessage());
        }
    }


    private function handleSuccess(string $message)
    {
        return redirect()->back()->with('success', $message);
    }

    private function handleError(string $message)
    {
        return redirect()->back()->with('error', $message);
    }

}
