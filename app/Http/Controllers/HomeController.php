<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function listQuestion() 
    {
        // $question = Question::all();
        $question=DB::table('questions')
                    ->join('users', 'users.id', '=', 'questions.id_user')
                    ->get();

        return view('question', compact('question'));
    }

    public function selfQuestion() 
    {
        $user = Auth::user();
        $question=DB::table('questions')
                    ->where('id_user', $user->id)
                    ->get();
        return view('selfQuestion', compact('question'));
    }

    public function selfAnswer() 
    {
        $user = Auth::user();
        $answer=DB::table('answers')
                    ->where('id_user', $user->id)
                    ->get();
        return view('selfAnswer', compact('answer'));
    }

    public function addQuestion(Request $request)
    {
        $user = Auth::user();
        Question::create([
            'pertanyaan' => $request->question,
            'id_user' => $user->id
        ]);
        return redirect()->route('listQuestion');
    }

    public function detailQuestion($id){
        $question=DB::table('questions')
                    ->join('users', 'users.id', '=', 'questions.id_user')
                    ->select('questions.*','users.name')
                    ->where('questions.id_question', $id)->get();
        $answer = DB::table('answers')
                    ->join('users', 'users.id', '=', 'answers.id_user')
                    ->select('answers.*','users.name')
                    ->where('answers.id_question', $id)->get();
        return view('detailQuestion', compact('question', 'answer'));
    }

    public function addAnswer(Request $request)
    {
        $user = Auth::user();
        Answer::create([
            'jawaban' => $request->answer,
            'id_user' => $user->id,
            'id_question' => $request->id_question
        ]);
        $temp =  $request->id_question;

        return redirect()->route('detailQuestion', $request->id_question );
    }

    public function sort()
    {
        $question= DB::table('questions')
                    ->join('users', 'users.id', '=', 'questions.id_user')
                    ->orderByDesc('questions.updated_at')->get();
        return view('question', compact('question'));
    }
    
    public function selfDetailQuestion($id)
    {
      $question=DB::table('questions')
                  ->join('users', 'users.id', '=', 'questions.id_user')
                  ->select('questions.*','users.name')
                  ->where('questions.id_question', $id)->get();
      $answer = DB::table('answers')
                  ->join('users', 'users.id', '=', 'answers.id_user')
                  ->select('answers.*','users.name')
                  ->where('answers.id_question', $id)->get();
      return view('selfDetailQuestion', compact('question', 'answer'));
    }

    // public function selfDetailAnswer($id)
    // {
    //   $question=DB::table('questions')
    //               ->join('users', 'users.id', '=', 'questions.id_user')
    //               ->select('questions.*','users.name')
    //               ->where('questions.id_question', $id)->get();
    //   $answer = DB::table('answers')
    //               ->join('users', 'users.id', '=', 'answers.id_user')
    //               ->select('answers.*','users.name')
    //               ->where('answers.id_question', $id)->get();
    //   return view('selfDetailAnswer', compact('question', 'answer'));
    // }

    public function selfDetailAnswer($id)
    {
      $question=DB::table('questions')
                  ->join('users', 'users.id', '=', 'questions.id_user')
                  ->join('answers', 'answers.id_question', '=', 'questions.id_question')
                  ->select('questions.*','users.name')
                  ->where('answers.id_answer', $id)->get();
      $temp=DB::table('questions')
                ->join('answers', 'answers.id_question', '=', 'questions.id_question')
                ->select('questions.id_question')
                // ->select
                ->where('answers.id_answer',$id)->first();
      $temp = get_object_vars($temp);
      $answer = DB::table('answers')
                  ->join('users', 'users.id', '=', 'answers.id_user')
                  ->select('answers.*','users.name')
                  ->where('answers.id_question', $temp)->get();
      return view('selfDetailAnswer', compact('question', 'answer'));
    }

    public function edit_question($id)
    {
        $question = DB::table('questions')->where('id_question', $id)->get();
        return view('edit_question', compact('question'));
    }

    public function edit_answer($id) {
        $answer = DB::table('answers')->where('id_answer', $id)->get();
        return view('edit_answer', compact('answer'));
    }

    public function update_question(Request $request)
    {

        DB::table('questions')->where('id_question', $request->id_question)->update([
            'pertanyaan' => $request->pertanyaan
        ]);
        return redirect()->route('listQuestion');
    }

    public function update_answer(Request $request)
    {

        DB::table('answers')->where('id_answer', $request->id_answer)->update([
            'jawaban' => $request->jawaban
        ]);
        return redirect()->route('selfAnswer');
    }


    public function delete_question($id)
    {
        $question = DB::table('questions')->where('id_question', $id);
        $question->delete();
        return redirect()->route('listQuestion');
    }

    public function delete_answer($id)
    {
        $answer = DB::table('answers')->where('id_answer', $id);
        $answer->delete();
        return redirect()->route('selfAnswer');
    }

}
