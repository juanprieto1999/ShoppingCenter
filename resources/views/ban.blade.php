<style>
	div{
		text-align: center;
		font-size: 30px;
		margin-top: 200px;
		color:rgba(80, 83, 78, 0.57);
		
	}
</style>
<div>
<h1>Ups usted a sido Baneado ! :( <h1>
<a href="{{ route('logout') }}"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
          {{ __('Click') }}
      </a></div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>