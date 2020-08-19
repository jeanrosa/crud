<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('id', 'DESC')->paginate(3);
        return view('Comment.index', compact('comments'));
    }
    public function enviarCorreo(Request $request)
    {
        $asunto = $request->asunto;
        $contenido = $request->contenido;
        $adjunto = $request->file('adjunto');
        Mail::send('email', ['contenido' => $contenido], function ($mail) use ($asunto, $adjunto) {
            $mail->from('', 'Bot de correos');
            $mail->to('');
            $mail->subject($asunto);
            $mail->attach($adjunto);
        });
        return response()->json(['status' => 200, 'message' => 'Envío exitoso']);
    }


    public function create()
    {
        return view('Comment.create');
    }

 
    public function store(Request $request)
    {
        $this->validate($request,[ 'status'=>'required', 'content'=>'required']);
        Comment::create($request->all());
        return redirect()->route('Comment.index')->with('success','Registro creado satisfactoriamente');
        Mail::to($request->user())->send(new OrderShipped($order));
    }


    public function show($id)
    {
        $comments=Comment::find($id);
        return  view('comment.show',compact('comments'));
    }

    public function edit($id)
    {
        $comment=comment::find($id);
        return view('comment.edit',compact('comment'));
    }


    public function update(Request $request, $id)
    {
        comment::find($id)->update($request->all());
        return redirect()->route('comment.index')->with('success','Registro actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->route('comment.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
