@props(['review' => $review])

@php
    $user = \App\Models\User::find($review->user_id);
    $date = date('F d, Y', strtotime($review->created_at));
    $userIdentifier = strtoupper(substr(md5($review->user_id), 0, 4));
    // get course name from course id
    $course = \App\Models\Courses::find($review->course_id);
    // create an array named $animals where all animals name will be there
    $animals = array('Aardvark','Albatross','Alligator','Alpaca','Ant','Anteater','Antelope','Ape','Armadillo','Donkey','Baboon','Badger','Barracuda','Bat','Bear','Beaver','Bee','Bison','Boar','Buffalo','Butterfly','Camel','Capybara','Caribou','Cassowary','Cat','Caterpillar','Cattle','Chamois','Cheetah','Chicken','Chimpanzee','Chinchilla','Chough','Clam','Cobra','Cockroach','Cod','Cormorant','Coyote','Crab','Crane','Crocodile','Crow','Curlew','Deer','Dinosaur','Dog','Dogfish','Dolphin','Dotterel','Dove','Dragonfly','Duck','Dugong','Dunlin','Eagle','Echidna','Eel','Eland','Elephant','Elk','Emu','Falcon','Ferret','Finch','Fish','Flamingo','Fly','Fox','Frog','Gaur','Gazelle','Gerbil','Giraffe','Gnat','Gnu','Goat','Goldfinch','Goldfish','Goose','Gorilla','Goshawk','Grasshopper','Grouse','Guanaco','Gull','Hamster','Hare','Hawk','Hedgehog','Heron','Herring','Hippopotamus','Hornet','Horse','Human','Hummingbird','Hyena','Ibex','Ibis','Jackal','Jaguar','Jay','Jellyfish','Kangaroo','Kingfisher','Koala','Kookabura','Kouprey','Kudu','Lapwing','Lark','Lemur','Leopard','Lion','Llama','Lobster','Locust','Loris','Louse','Lyrebird','Magpie','Mallard','Manatee','Mandrill','Mantis','Marten','Meerkat','Mink','Mole','Mongoose','Monkey','Moose','Mosquito','Mouse','Mule','Narwhal','Newt','Nightingale','Octopus','Okapi','Opossum','Oryx','Ostrich','Otter','Owl','Oyster','Panther','Parrot','Partridge','Peafowl','Pelican','Penguin','Pheasant','Pig','Pigeon','Pony','Porcupine','Porpoise','Quail','Quelea','Quetzal','Rabbit','Raccoon','Rail','Ram','Rat','Raven','Red deer','Red panda','Reindeer','Rhinoceros','Rook','Salamander','Salmon','Sand Dollar','Sandpiper','Sardine','Scorpion','Seahorse','Seal','Shark','Sheep','Shrew','Skunk','Snail','Snake','Sparrow','Spider','Spoonbill','Squid','Squirrel','Starling','Stingray','Stinkbug','Stork','Swallow','Swan','Tapir','Tarsier','Termite','Tiger','Toad','Trout','Turkey','Turtle','Viper','Vulture','Wallaby','Walrus','Wasp','Weasel','Whale','Wildcat','Wolf','Wolverine','Wombat','Woodcock','Woodpecker','Worm','Wren','Yak','Zebra');
    // get the user id and get the nth element, if it crosses the array limit, it will reset from 0
    $anonIdentifier = $animals[$review->user_id % count($animals)];
@endphp
<div class="review-box clearfix">
    <a href="/profile/{{ $user->id }}"><figure class="rev-thumb">
        <img src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($user->id . $user->created_at) }}&scale=110" alt="">
    </figure></a>
    <div class="rev-content">
        <div class="rev-info">
            @auth
            @if ($review->isAnonymous == 0 && Auth::user()->role == 'student')
                <a href="/profile/{{ $user->id }}"><b style="font-size: 1rem;">{{ $user->name }}</b></a><br>
            @elseif (Auth::user()->role == 'faculty')
                <b style="font-size: 1rem;">Anonymous {{$anonIdentifier}}</b>&nbsp;<i class="icon-info-circled-alt" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Anonymous {{$anonIdentifier}}#{{ $userIdentifier }}"></i><br>
            @elseif (Auth::user()->role == 'student')
                <b style="font-size: 1rem;">Anonymous {{$anonIdentifier}}</b>&nbsp;<i class="icon-info-circled-alt" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Anonymous {{$anonIdentifier}}#{{ $userIdentifier }}"></i><br>
            @endauth
            @else
                <b style="font-size: 1rem;">Anonymous {{$anonIdentifier}}</b>&nbsp;<i class="icon-info-circled-alt" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Anonymous {{$anonIdentifier}}#{{ $userIdentifier }}"></i><br>
            @endif
            {{ $date }} - <a href="/faculties?course={{ $course->course_code }}"><div class="btn_1 outline" style="padding: 1px 5px;" data-bs-toggle="tooltip" data-bs-placement="top"
                title="{{ $course->course_title }}">{{ $course->course_code }}&nbsp;</div></a>
        </div>
        <div class="rating" style="padding-bottom: 0.5em;">
            @for ($i = 0; $i < $review->rating; $i++)
                <i class="icon_star voted"></i>
            @endfor
            @for ($i = 0; $i < 5 - $review->rating; $i++)
                <i class="icon_star"></i>
            @endfor
        </div>
        <div class="rev-text">
            <p>
                {{ $review->review }}
            </p>
        </div>
    </div>
</div>
