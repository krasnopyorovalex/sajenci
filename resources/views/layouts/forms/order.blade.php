<section class="order__form">
    <div class="container">
        <div class="row">
            <div class="col-7">
                <div class="as__h1">{{ $form_title ?? 'Заказать сайт' }}</div>
                <div class="sub__title">{{ $form_sub_title ?? 'Вы можете бесплатно  получить аудит вашего сайта. Вас это не к чему не обязывает.' }}</div>

                <form action="{{ route('order.consultation.send') }}" method="post" id="order__consultation-form" onsubmit="yaCounter45495162.reachGoal('KONSULTACIA'); return true">
                    @csrf
                    <div class="single__block">
                        <input type="text" name="name" placeholder="Ваше имя" autocomplete="off" required>
                    </div>
                    <div class="single__block">
                        <input type="email" name="email" placeholder="Ваш e-mail" autocomplete="off" required>
                    </div>
                    <div class="single__block">
                        <input type="text" name="phone" autocomplete="off" required>
                    </div>
                    <div class="single__block message">
                        <textarea name="message" id="message" placeholder="Дополнительная информация"></textarea>
                    </div>
                    <div class="single__block agree__block">
                        <input type="checkbox" name="agree" id="i_agree-2" value="1" checked>
                        <label for="i_agree-2">Оставляя заявку, Вы соглашаетесь на <a href="{{ route('page.show', ['alias' => 'personal-data']) }}" target="_blank" title="Перейти на страницу описания">обработку персональных данных</a></label>
                        <p class="error">Согласитесь на обработку персональных данных</p>
                    </div>
                    <div class="single__block submit__block">
                        <button type="submit">{{ $btn_text ?? 'Отправить' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>