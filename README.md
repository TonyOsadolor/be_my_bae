<p align="center"><a href="/" target="_blank"><img src="https://www.dreamstime.com/royalty-free-stock-photography-cupid-image7713747" width="400" alt="Cupid"></a></p>


## 💖 Be My Bae

A beautifully crafted, interactive web application designed to transition from the "talking stage" to the "forever stage." 
Built with **Laravel** and **Livewire**, this project turns a meaningful romantic milestone into an engaging, playful, and emotionally reassuring digital experience.

## 📖 The Story Behind the Code

You might have been talking for a while, and you think this is needed to move into the next phase, navigating life, sharing thoughts, and building a connection. While the feelings are deeply rooted, you haven't officially defined the journey yet. And you want to ask the question not just with words, but in a way that reflects who you are and how much she means to you.

This app acknowledges all the real world nuances: the busy headspaces, the overwhelm of life, the hesitation of moving too fast, and the dislike of multitasking. It’s a gentle, reassuring, and playful invitation to build something solid and beautiful together, at a pace that feels right.

## 🎮 How It Works

The application adapts based on how she interacts with it, offering a mix of playful persistence and heartfelt sincerity:

### 🖥️ Desktop Experience

* **The "Yes" Button:** Leads directly to a beautifully designed page filled with words of affirmation, a declaration of intent, and a vision of the beautiful goals you can achieve together.
* **The "No" Button:** Features a playful hover evasion mechanic. The moment the cursor approaches, the button dynamically moves away, ensuring that love always finds a way.

### 📱 Mobile Experience

* **The Loop of Encouragement:** Since touchscreens don't support cursor hovers, clicking the "No" button triggers an endless, lighthearted loop. It cycles through random, encouraging pop-ups ("Did you mean to click YES?", "Are you absolutely sure?") and gentle affirmations until she finally taps "Yes."

## 🛠️ Tech Stack

This project leverages modern backend and frontend reactivity to create a seamless, zero-refresh user experience:

* **Framework:** [Laravel (PHP)](https://laravel.com/) - Providing a robust, secure, and elegant backend structure.
* **Frontend Reactivity:** [Livewire](https://livewire.laravel.com/) - Powering the dynamic button movements, state management, and real-time interactive loops without full page reloads.
* **Styling:** Tailwind CSS *(or your preferred CSS framework)* - Creating a warm, inviting, and visually polished aesthetic.

## 💌 The Opening Message (The Heart of the App)

When she lands on the page, she is greeted with a message designed to reassure and comfort her:

> "I know we’ve been sharing our lives for a few months now, and while it has been amazing, we haven't officially started our journey together. I wanted to change that in a way that's as unique as what we share.
> I know life is loud right now, your headspace is busy, and trying to figure out the future can feel overwhelming. I know you hate to multitask and that sometimes, things feel like they're moving too fast. But I want you to know: there is no rush. I am right here, and I believe we can build something incredibly solid, steady, and beautiful together. So, let's make it official..."

## 🚀 Getting Started
##### Setting up your workspace
Before running this app, locally make sure you have the following software installed:
<ul>
    <li>XAMPP/WAMP/LAMP or it's equivalent</li>
    <!-- <li>NPM</li> -->
    <li>Composer</li>
    <li>A Web Browser</li>
</ul>
<ol>
    <li>Go to <code>https://github.com/TonyOsadolor/be_my_bae.git</code>.</li>
    <li>Clone your forked repo. Navigate to your desired folder in your local machine using your favourite CMD terminal. Run: <code>git clone https://github.com/TonyOsadolor/be_my_bae.git</code>.</li>
    <li>Run <code>cd be_my_bae</code></li>
    <li>Run <code>composer install</code></li>
    <!-- <li>Run <code>npm install</code></li> -->
    <li>Copy all the contents of the <code>.env.example</code> file. Create <code>.env</code> file and paste all the contents you copied from <code>.env.exmaple</code> file to your <code>.env</code> file.</li>
    <li>Run <code>php artisan key:generate</code> to generate and assign a base64 encoded string for Laravel's APP_KEY in <code>.env</code></li>
    <li>The default database of the application is database is <code>database.sqlite</code>, just create a new file name <code>database.sqlite</code> inside your database folder.</li>
    <li>If you want to use other source for your database, you can do so, and just point your <code>.env</code> configuration ot the right place.</li>
    <li>When that is done, run <code>php artisan migrate --seed</code> in your terminal to migrate all the necessary database tables into your local database and seed any additional configuration that should be seeded.</li>
    <li>Run php artisan serve from your terminal and the app will be running on <code>http://127.0.0.1:8000/</code> on your browser</li>
</ol>

## Contributing

##### REMINDER on contributing:
<ol>
    <li>Always create branch for your contributions <code>git checkout -b &lt;branchname&gt;</code>.</li>
    <li>After you make changes:</li>
    <ul>
        <li><code> git add .</code></li>
        <li><code> git commit -m "some comments"</code></li>
        <li><code> git push origin < name of your branch > </code></li>
    </ul>
    <li>Create PR.</li>
</ol>

### 💡 A quick tip for the road:

You can add functionalities to record her reaction (or have her screen-record it) when she tries to click the "No" button on desktop or gets caught in the mobile loop. Good luck, man—you've got this! Let's get this "Yes!" 🚀🔥

## Laravel License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
