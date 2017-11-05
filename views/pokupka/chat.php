<center>
    <? if (empty($_SESSION['user'])) { ?>
        <h4>Эта страница доступна только <a href="/user/register">зарегистрированным</a>
            пользователям.</h4><br><br>
        <a class="customButton" href="/user/register">ЗАРЕГИСТРИРОВАТЬСЯ</a>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspИЛИ
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <a class="customButton" href="/user/login"> ВОЙТИ</a>
    <? } else { ?>
        <form method="POST" action="/continue-payment">
            <h4>Выберите покупаемый вариант:</h4>
            <select required="" name="time" style="height: 50px;font-size: 16pt;padding: 5px;background-color: #F5F5F5;">
                <option value="1">Начать марафон - 1 000 руб.</option>
                <option value="7">Неделя (7 суток) - 3 500 руб.</option>
                <option value="30">Месяц (30 суток) - 5 500 руб.</option>
                <option value="90">3 месяца (90 суток) - 7 999 руб.</option>
            </select><br><br>
            <input type="hidden" name="subscr_type" value="regular">
            <input type="submit" name="submit-time" value="Продолжить">
        </form>
    <? } ?>
</center>