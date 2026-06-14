<div class="min-h-screen bg-gradient-to-br from-orange-50 to-green-50 flex flex-col justify-center items-center p-6 relative overflow-hidden" x-data="{ isMobile: window.innerWidth < 768 }">

    <div class="max-w-xl w-full bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-orange-100 text-center z-10">

        @if($step === 'proposal')
        <h1 class="text-3xl font-bold text-gray-800 mb-6 font-serif">{{ $proposal->name }} 🧡</h1>

        <p class="text-gray-600 leading-relaxed mb-8 text-justify whitespace-pre-line">
            {{ $currentMessage }}
        </p>

        <div class="relative w-full min-h-[12rem] md:h-48 flex flex-col md:flex-row justify-center items-center gap-4 border border-dashed border-orange-100 rounded-xl bg-orange-50/30 p-6" x-ref="container" x-data="{ x: 0, y: 0 }">

            <!-- YES BUTTON -->
            <button wire:click="startConfirmation" :class="isMobile ? 'w-full py-3 text-center' : 'absolute left-1/4 transform -translate-x-1/2 px-6 py-3 hover:scale-105'" class="bg-green-600 hover:bg-green-700 text-white font-medium rounded-full shadow-lg transition text-lg z-10">
                Yes! 🥰
            </button>

            <!-- NO BUTTON -->
            <button wire:click="handleNoClick" x-on:mouseover="if(!isMobile) { 
                    let container = $refs.container.getBoundingClientRect();
                    let btnWidth = $el.offsetWidth;
                    let btnHeight = $el.offsetHeight;

                    let maxW = (container.width / 2) - (btnWidth / 2) - 16;
                    let maxH = (container.height / 2) - (btnHeight / 2) - 16;

                    x = (Math.random() * (maxW * 2)) - maxW;
                    y = (Math.random() * (maxH * 2)) - maxH;
                }" :style="!isMobile ? `position: absolute; transform: translate(${x}px, ${y}px); transition: all 0.15s cubic-bezier(0.25, 1, 0.5, 1);` : ''" :class="isMobile ? 'w-full py-3 text-center' : 'px-6 py-3'" class="bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-full shadow-md text-lg z-20 select-none">
                {{ $noButtonText }}
            </button>
        </div>

        @elseif($step === 'confirm')
        <div class="animate-fade-in py-6">
            <div class="text-5xl mb-4">🤭</div>
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Just to double check...</h2>
            <p class="text-gray-600 mb-8 max-w-sm mx-auto">
                Are you completely sure about this choice? There is premium attention, shared playlists, and zero pressure on the other side.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button wire:click="finalAccept" class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-full shadow-lg text-lg">
                    Yes, I am completely sure! 🧡
                </button>
                <button wire:click="$set('step', 'proposal')" class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-full text-md">
                    Wait, let me reread.
                </button>
            </div>
        </div>

        @elseif($step === 'final')
        <div class="text-left space-y-6">

            @if(isset($proposal) && $proposal->status === 'accepted')
            <div class="text-center mb-2">
                <span class="inline-flex items-center px-4 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800 tracking-wide uppercase shadow-sm">
                    ✨ Safe Harbor Locked In
                </span>
            </div>
            @endif

            <div class="text-center">
                <div class="text-6xl mb-2 animate-bounce">🎉</div>
                <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-orange-500 mb-2">
                    My Whole Heart, Yes.
                </h1>

                @if(isset($proposal) && $proposal->name)
                <p class="text-sm font-semibold text-gray-500 mt-1">
                    Welcome Home, <span class="text-orange-600 font-bold text-base">{{ $proposal->name }}</span>. ✨
                </p>
                @endif
            </div>

            <div class="space-y-4 text-gray-700 leading-relaxed text-sm sm:text-base">
                <p class="font-semibold text-center text-green-700 italic text-base sm:text-lg mb-6">
                    "Thank you for trusting me with your heart. Here is my promise to you..."
                </p>
                <hr class="border-orange-100 my-4" />

                <div class="space-y-6 text-gray-700 leading-relaxed text-sm sm:text-base">
                    <p>
                        From the very first day we started talking, I felt something completely different
                        something gentle, yet powerful. These past months have been filled with laughter,
                        late night thoughts, and quiet moments that I’ll always treasure. Saying "yes"
                        today isn't just about starting a relationship; it's about choosing to build something steady,
                        real, and lasting together as an unbreakable team.
                    </p>

                    <p>
                        ✨ I admire your resilience, your brilliant mind, and how deeply you care
                        about everything you touch. I know life can feel overwhelming, and the pace of the world makes us hesitate,
                        but you don't have to change a single thing or perform for me. With me, you don’t need to multitask or rush.
                        I want to walk side by side at your rhythm, being the calm in your busy world and the smile that reminds you
                        that you are entirely enough just as you are.
                    </p>

                    <p>
                        🌱 <strong>What I Hope We Build Together:</strong> I want us to create a space where you can completely unpack
                        your thoughts without a single ounce of judgment. A safe harbor where honesty, kindness, and love always win.
                        Together, I hope we’ll share beautiful adventures, travel to places we’ve only dreamed of, and celebrate milestones
                        big and small. But just as much, I look forward to the quiet indoor days whether you want to listen to music, share playlists,
                        and grow stronger through every challenge life throws our way.
                    </p>

                    <p>
                        So here is my promise: to cherish you, to support you, to listen closely when words are hard to find, and to lift
                        the weight when life feels heavy. I want us to build a true partnership, a deep friendship, and a love story
                        worth telling.
                    </p>
                </div>

                <h2 class="text-xl sm:text-2xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-orange-500 mt-8">
                    💕 Here’s to us, to our journey, and to everything beautiful we’ll create together. 💕
                </h2>
            </div>

            <div class="mt-8 p-6 bg-gradient-to-r from-orange-50 to-green-50 rounded-xl border border-orange-100">
                <h3 class="text-xl font-bold text-gray-800 mb-2 flex items-center gap-2">
                    🥂 Our Celebration Plans
                </h3>

                @if(!$schedulerSubmitted)
                <p class="text-xs text-gray-500 mb-4">
                    Pick a date, time, and where you'd love us to go. No pressure—just a sweet time for us.
                </p>

                <form wire:submit.prevent="saveOuting" class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Where would you like to go?</label>
                        <input type="text" wire:model.defer="outingLocation" placeholder="e.g., That quiet rooftop lounge, a cozy dinner..." class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-500 text-sm bg-white" />
                        @error('outingLocation') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Choose Date</label>
                            <input type="date" wire:model.defer="selectedDate" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-500 text-sm bg-white" />
                            @error('selectedDate') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Choose Time</label>
                            <input type="time" wire:model.defer="selectedTime" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-500 text-sm bg-white" />
                            @error('selectedTime') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Your Email (To receive our relationship certificate) 📜</label>
                        <input type="email" wire:model.defer="email" placeholder="Enter your email address..." class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-500 text-sm bg-white" />
                        @error('email') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Is there anything else you'd like to say? (Optional)</label>
                        <textarea wire:model.defer="herNote" rows="3" placeholder="Any thoughts, sweet reminders, or your favorite meals..." class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-500 text-sm bg-white resize-none"></textarea>
                        @error('herNote') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" wire:loading.attr="disabled" class="w-full py-2 bg-gradient-to-r from-orange-500 to-green-600 hover:from-orange-600 hover:to-green-700 text-white font-medium rounded-lg text-sm transition shadow-md cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed inline-flex items-center justify-center">
                        <span wire:loading.remove>
                            Confirm Our Outing Setup ✨
                        </span>

                        <span wire:loading class="inline-flex items-center justify-center">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Locking It In...
                        </span>
                    </button>
                </form>
                @else
                <div class="text-center py-4 text-green-700 font-medium animate-fade-in space-y-3">
                    <div>
                        Love it! Marked on my calendar: <br>
                        <span class="text-gray-800 font-bold">{{ $outingLocation }}</span> on
                        <span class="text-gray-800 font-bold">{{ \Carbon\Carbon::parse($selectedDate)->format('F j, Y') }}</span> at
                        <span class="text-gray-800 font-bold">{{ $selectedTime }}</span>.
                    </div>

                    @if($herNote)
                    <div class="bg-white/60 rounded-lg p-3 border border-orange-100 max-w-sm mx-auto text-left text-xs italic text-gray-600">
                        <span class="font-semibold block text-gray-500 not-italic uppercase tracking-wider mb-1">Your Note:</span>
                        "{!! nl2br(e($herNote)) !!}"
                    </div>
                    @endif

                    <div class="inline-block mt-2 px-4 py-1.5 rounded-lg text-xs bg-orange-100 text-orange-800 font-medium border border-orange-200">
                        📜 Your beautiful Relationship Certificate has been sent to your email!
                    </div>

                    <div class="text-sm pt-2 text-gray-700 font-normal">
                        I'll handle everything else. See you then! 😉
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>

    <div class="absolute top-10 left-10 w-32 h-32 bg-orange-200 rounded-full mix-blend-multiply filter blur-xl opacity-30"></div>
    <div class="absolute bottom-10 right-10 w-32 h-32 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-30"></div>
</div>
