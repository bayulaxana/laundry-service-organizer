{{ flash.output() }}
<form  class="ui container" method="post" action="{{ url('register') }}">
    {{ form.label('name') }}
    {{ form.render('name') }}
    </br>
    {{ form.label('username') }}
    {{ form.render('username') }}
    </br>
    {{ form.label('password') }}
    {{ form.render('password') }}
    </br>
    {{ form.label('email') }}
    {{ form.render('email') }}
    </br>
    {{ form.label('phone') }}
    {{ form.render('phone') }}
    </br>
    {{ form.label('gender') }}
    {{ form.render('gender') }}
    </br>
    {{ form.label('address') }}
    {{ form.render('address') }}
    </br>
    <input type="submit" value="Daftar">
</form>