<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Forms\CallbackRequest;
use App\Mail\CallbackSent;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Mail;

/**
 * Class CallbackController
 * @package App\Http\Controllers
 */
class CallbackController extends Controller
{
    use DispatchesJobs;

    /**
     * @param CallbackRequest $request
     * @return array
     */
    public function callback(CallbackRequest $request): array
    {
        Mail::to([env('MAIL_ADDRESS')])->send(new CallbackSent($request->all()));

        return [
            'message' => 'Форма отправлена успешно. Наш менеджер свяжется с Вами в ближайшее время',
            'status' => 200
        ];
    }
}
