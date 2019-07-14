<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Models\Feedback;
use App\Http\Models\Member;
use App\Http\Requests\Members\StoreMember;
use App\Http\Requests\Members\UpdateMember;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    private $feedback;

    /**
     * FeedbackController constructor.
     * @param $feedback
     */
    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $feedback = $this->feedback
            ->orderBy('id', 'desc')
            ->search($request->input('search'), ['id', 'name', 'phone', 'email'])
            ->paginate(15);
        return view('admin.pages.feedback.index', compact('feedback'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feedback $feedback
     * @return Response
     * @throws \Exception
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->back();
    }

}
