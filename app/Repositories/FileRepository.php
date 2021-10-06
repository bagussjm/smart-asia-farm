<?php


namespace App\Repositories;


use App\Models\Landmark;
use App\Models\Post;
use App\Models\Profil;
use App\Models\Wahana;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileRepository
{
    private  $fileSource;

    /***
     * @param Request $request
     * @return string
     * @throws
     */
    public function upload(Request $request)
    {
        try{
            if ($request->hasFile('image')){
                $file = $request->file('image')->store($request->input('storage'));
                return Storage::url($file);
            }
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            throw new \Exception('internal server error');
        }
        return  '';
    }

    /***
     * @param Request $request
     * @return boolean
     * @throws
    */
    public function remove(Request $request)
    {
        try{
            $pathFile = str_replace('/storage','',$request->storage);
            Storage::disk('public')->delete($pathFile);
            return true;
        }catch (\Exception $exception){
            throw new \Exception('internal server error');
        }
    }

    /***
     * @param Request $request
     * @return mixed
     * @throws
     * */
    public function pull(Request $request)
    {
        try{
            $fileSliced = $this->pullAndUpdate($request);
            $column = $request->input('column');
            return $this->fileSource->update([
                $column => $fileSliced
            ]);
        }catch (\Exception $exception){
            throw new \Exception('internal server error');
        }
    }

    /***
     * @param Request $request
     * @return mixed
     * @throws
     * */
    public function pullAndUpdate(Request $request){
        try{
            $table = $request->input('table');
            $column = $request->input('column');
            $id = $request->input('id');
            $search = $request->input('storage');
            $fileCollection = $this->findOrFail($table,$id);
            $fileSource = collect($fileCollection->$column);
            $fileOffset = $fileSource->search($search);
            $fileSource->splice($fileOffset,1)->all();
            $this->setFileSource($fileCollection);
            return $fileSource;
        }catch (\Exception $exception){
            throw new \Exception('internal server error');
        }
    }

    /**
     * @param  mixed
     * @return void
     */
    public function setFileSource($fileSource)
    {
        $this->fileSource = $fileSource;
    }

    /**
     * @return Collection
     * @return mixed
     */
    public function getFileSource()
    {
        return $this->fileSource;
    }

    /***
     * @param string $table
     * @param string $id
     * @return Collection
     * @throws
     * */
    public function findOrFail($table,$id)
    {
        try{
            switch ($table){
                case 'wahana':
                    return  Wahana::findOrFail($id);
                    break;
                case 'landmark':
                    return Landmark::findOrFail($id);
                    break;
                case 'profil':
                    return Profil::findOrFail($id);
                    break;
                case 'post':
                    return  Post::findOrFail($id);
                    break;
            }
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
        return collect(['id' => null]);
    }
}
