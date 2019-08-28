<div class="form_callback-popup">
    <div class="container">
        <form action="{{ route('send.callback') }}" id="form_callback-header" class="decorate">
            @csrf
            <div class="title">Заказ обратного звонка</div>
            <div class="single_block">
                <input type="text" name="name" placeholder="Ваше имя" required autocomplete="off">
            </div>
            <div class="single_block">
                <input type="text" name="phone" placeholder="Ваше телефон" required autocomplete="off">
            </div>
            <div class="single_block i_agree">
                <input type="checkbox" name="agree" id="i_agree-2" value="1" checked="checked">
                <label for="i_agree-2">Оставляя заявку, Вы соглашаетесь на обработку персональных данных</label>
            </div>
            <div class="single_block submit">
                <button class="btn btn_send">
                    <svg>
                        <use xlink:href="{{ asset('img/sprites/sprite.svg#send') }}"></use>
                    </svg>
                    Отправить
                </button>
            </div>
            <div class="close" title="Закрыть форму">
                <svg>
                    <use xlink:href="{{ asset('img/sprites/sprite.svg#close') }}"></use>
                </svg>
            </div>
        </form>
    </div>
</div>
