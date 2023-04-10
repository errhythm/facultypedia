@props(['review', 'role'])

@php
    $user = \App\Models\User::find($review->user_id);
    $faculty = \App\Models\User::find($review->faculty_id);
    // get current profile id f
    $date = date('F d, Y', strtotime($review->created_at));
    $userIdentifier = strtoupper(substr(md5($review->user_id), 0, 4));
    // get course name from course id
    $course = \App\Models\Courses::find($review->course_id);
    // create an array named $animals where all animals name will be there
    $animals = [
        'Aardvark',
        'Albatross',
        'Alligator',
        'Alpaca',
        'Ant',
        'Anteater',
        'Antelope',
        'Ape',
        'Armadillo',
        'Donkey',
        'Baboon',
        'Badger',
        'Barracuda',
        'Bat',
        'Bear',
        'Beaver',
        'Bee',
        'Bison',
        'Boar',
        'Buffalo',
        'Butterfly',
        'Camel',
        'Capybara',
        'Caribou',
        'Cassowary',
        'Cat',
        'Caterpillar',
        'Cattle',
        'Chamois',
        'Cheetah',
        'Chicken',
        'Chimpanzee',
        'Chinchilla',
        'Chough',
        'Clam',
        'Cobra',
        'Cockroach',
        'Cod',
        'Cormorant',
        'Coyote',
        'Crab',
        'Crane',
        'Crocodile',
        'Crow',
        'Curlew',
        'Deer',
        'Dinosaur',
        'Dog',
        'Dogfish',
        'Dolphin',
        'Dotterel',
        'Dove',
        'Dragonfly',
        'Duck',
        'Dugong',
        'Dunlin',
        'Eagle',
        'Echidna',
        'Eel',
        'Eland',
        'Elephant',
        'Elk',
        'Emu',
        'Falcon',
        'Ferret',
        'Finch',
        'Fish',
        'Flamingo',
        'Fly',
        'Fox',
        'Frog',
        'Gaur',
        'Gazelle',
        'Gerbil',
        'Giraffe',
        'Gnat',
        'Gnu',
        'Goat',
        'Goldfinch',
        'Goldfish',
        'Goose',
        'Gorilla',
        'Goshawk',
        'Grasshopper',
        'Grouse',
        'Guanaco',
        'Gull',
        'Hamster',
        'Hare',
        'Hawk',
        'Hedgehog',
        'Heron',
        'Herring',
        'Hippopotamus',
        'Hornet',
        'Horse',
        'Human',
        'Hummingbird',
        'Hyena',
        'Ibex',
        'Ibis',
        'Jackal',
        'Jaguar',
        'Jay',
        'Jellyfish',
        'Kangaroo',
        'Kingfisher',
        'Koala',
        'Kookabura',
        'Kouprey',
        'Kudu',
        'Lapwing',
        'Lark',
        'Lemur',
        'Leopard',
        'Lion',
        'Llama',
        'Lobster',
        'Locust',
        'Loris',
        'Louse',
        'Lyrebird',
        'Magpie',
        'Mallard',
        'Manatee',
        'Mandrill',
        'Mantis',
        'Marten',
        'Meerkat',
        'Mink',
        'Mole',
        'Mongoose',
        'Monkey',
        'Moose',
        'Mosquito',
        'Mouse',
        'Mule',
        'Narwhal',
        'Newt',
        'Nightingale',
        'Octopus',
        'Okapi',
        'Opossum',
        'Oryx',
        'Ostrich',
        'Otter',
        'Owl',
        'Oyster',
        'Panther',
        'Parrot',
        'Partridge',
        'Peafowl',
        'Pelican',
        'Penguin',
        'Pheasant',
        'Pig',
        'Pigeon',
        'Pony',
        'Porcupine',
        'Porpoise',
        'Quail',
        'Quelea',
        'Quetzal',
        'Rabbit',
        'Raccoon',
        'Rail',
        'Ram',
        'Rat',
        'Raven',
        'Red deer',
        'Red panda',
        'Reindeer',
        'Rhinoceros',
        'Rook',
        'Salamander',
        'Salmon',
        'Sand Dollar',
        'Sandpiper',
        'Sardine',
        'Scorpion',
        'Seahorse',
        'Seal',
        'Shark',
        'Sheep',
        'Shrew',
        'Skunk',
        'Snail',
        'Snake',
        'Sparrow',
        'Spider',
        'Spoonbill',
        'Squid',
        'Squirrel',
        'Starling',
        'Stingray',
        'Stinkbug',
        'Stork',
        'Swallow',
        'Swan',
        'Tapir',
        'Tarsier',
        'Termite',
        'Tiger',
        'Toad',
        'Trout',
        'Turkey',
        'Turtle',
        'Viper',
        'Vulture',
        'Wallaby',
        'Walrus',
        'Wasp',
        'Weasel',
        'Whale',
        'Wildcat',
        'Wolf',
        'Wolverine',
        'Wombat',
        'Woodcock',
        'Woodpecker',
        'Worm',
        'Wren',
        'Yak',
        'Zebra',
    ];
    // get the user id and get the nth element, if it crosses the array limit, it will reset from 0
    $anonIdentifier = $animals[$review->user_id % count($animals)];
@endphp


<li class="grid grid-cols-1 gap-x-8 gap-y8 py-8 md:grid-cols-7">
    <div class="col-span-2">
        <div class="flex items-center space-x-px">
            @for ($i = 0; $i < $review->rating; $i++)
            <svg class="w-5 h-5 text-warning" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                </path>
            </svg>
            @endfor
            @for ($i = 0; $i < 5 - $review->rating; $i++)
            <svg class="w-5 h-5 text-base-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                </path>
            </svg>
            @endfor
        </div>
        <div class="flex items-start mt-5 md:flex-col">
            <div class="flex-shrink-0">
                <p class="text-sm font-bold text-base-content">
                    @auth
                        @if ($review->isAnonymous == 0 && Auth::user()->role == 'student')
                            @if ($role == 'faculty')
                                <a href="/profile/{{ $user->id }}">{{ $user->name }}</a><br>
                            @elseif ($role == 'student')
                                <a href="/profile/{{ $faculty->id }}"><i
                                        class="icon-right-big"></i>{{ $faculty->name }}</a><br>
                            @endif
                        @elseif (Auth::user()->role == 'faculty')
                            Anonymous {{ $anonIdentifier }}
                            @elseif ($review->isAnonymous == 1)
                                Anonymous {{ $anonIdentifier }}
                        @endauth
                    @else
                        Anonymous {{ $anonIdentifier }}
                    @endif
                </p>
                <p class="font-normal text-sm mt-1 text-base-content/70">
                    {{ $date }}
                </p>
            </div>
        </div>
    </div>
    <div class="md:col-span-5">
        <p class="text-base font-bold text-base-content">
            {{ $course->course_code }}
        </p>
        <blockquote class="mt-4">
            <p class="text-sm font-normal leading-6 text-base-content">
                {{ $review->review }}
            </p>
        </blockquote>
    </div>
</li>

