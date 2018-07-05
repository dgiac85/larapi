<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return ['name' => 'Giacomo'];
        //return User::get();

        return response()->json(
            [
                'data' => User::get(),
                'success' => true
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         //
         $data=[];
         $message='';
         try{
             $User=new User();
    
             //aggiorniamo i dati con i dati ricevuti dalla request
             $postData=$request->except('id','_method'); //update di tutti i dati eccetto l'id
             $postData['password']=bcrypt('test'); //la funzione serve a criptare la password

             $User->fill($postData);
             $success = $User->save();


             $data = $User;
       
         }
         catch (\Exception $e){

             $success = true;
             $message = $e->getMessage();
         }
         return compact('data','message','success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data=[];
        $message='';
        try{
            /*return response()->json(
                [
                    'data' => User::findOrFail($id),
                    'success' => true
                ]
            );  */
            $data=User::findOrFail($id);
            $success=true;
        }
        catch (\Exception $e){
            /*return response()->json(
                [
                    'data' => [],
                    'message' => $e->getMessage()
                ]
            );*/
            $success = true;
            $message = $e->getMessage();
        }
        return compact('data','message','success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=[];
        $message='';
        try{
            $User=User::findOrFail($id);
            $success=true;
            //aggiorniamo i dati con i dati ricevuti dalla request
            $postData=$request->except('id','_method'); //update di tutti i dati eccetto l'id
            $postData['password']=bcrypt('test'); //la funzione serve a criptare la password
            $success =$User->update($postData);
            $data = $User;
      
        }
        catch (\Exception $e){
            /*return response()->json(
                [
                    'data' => [],
                    'message' => $e->getMessage()
                ]
            );*/
            $success = true;
            $message = $e->getMessage();
        }
        return compact('data','message','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data=[];
        $message= "l'utente è stato eliminato";
        try{
            $User=User::findOrFail($id);
            $data=$User;
            $success=$User->delete();
      
        }
        catch (\Exception $e){
            $success = false;
            $message = "User not found";
        }
        return compact('data','message','success');

    }
}
