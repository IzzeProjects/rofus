<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{

    private $feedback;

    /**
     * FeedbackController constructor.
     * @param Feedback $feedback
     */
    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    public function feedback(Request $request)
    {

        if (!$this->throttleCheck($request, 10, 2)) {
            return response()
                ->json(['auth' => ['Много попыток авторизации !']])
                ->setStatusCode(429);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()
                ->json($validator->getMessageBag()->getMessages())
                ->setStatusCode(400);
        }

        $this->feedback->create($request->all());

        return response()->json(['message' => 'Ваше заявка отправлена !']);
    }

}
