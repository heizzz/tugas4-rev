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

    public function listQuestion(){
        $question = Question::all();
        return view('question', compact('question'));
    }

    public function selfQuestion(){
        $user = Auth::user();
        $question=DB::table('questions')
                    ->where('id_user', $user->id)
                    ->get();
        return view('selfQuestion', compact('question'));
    }

    public function selfAnswer(){
        $user = Auth::user();
        $answer=DB::table('answers')
                    ->where('id_user', $user->id)
                    ->get();
        return view('selfAnswer', compact('answer'));
    }
    public function addQuestion(Request $request){
        $user = Auth::user();
        Question::create([
            'pertanyaan' => $request->question,
            'id_user' => $user->id
        ]);
        // return ($request);
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
        // return ($question);
        return view('detailQuestion', compact('question', 'answer'));
    }

    public function addAnswer(Request $request){
        // return "masuk";
        $user = Auth::user();
        Answer::create([
            'jawaban' => $request->answer,
            'id_user' => $user->id,
            'id_question' => $request->id_question
        ]);
        $temp =  $request->id_question;

        return redirect()->route('detailQuestion', $request->id_question );
    }

    public function sort(){
        $question= DB::table('questions')
                    ->orderByDesc('updated_at')->get();
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
}
