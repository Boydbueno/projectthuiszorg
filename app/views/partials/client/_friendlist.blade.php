<!-- Friendlist -->
<section class="block friendList" id="friendList">
    <header class='mainTitle floatFix'>
        <h1 class="floatLeft">{{ link_to('client/friendlist', 'Vriendenlijst')}}</h1>
        <a class="subTitle floatRight">Verbergen</a>
    </header>
    <section>
        <ul>
            @foreach ($friends as $friend)
                <li id="{{ $friend->id }}" class="friend">{{ $friend->userInfo->firstName }} {{ $friend->userInfo->lastName }}</li>
            @endforeach
        </ul>
    </section>
</section>