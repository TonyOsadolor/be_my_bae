@component('mail::message')
# This is a Sealed Deal! 📜

Hi {{ $proposal->name ?? 'Sweetheart' }},

The noise of the outside world has been officially silenced. We have mutually chosen to drop all performance and step forward as an unbreakable team. 

Your official **Certificate of Relationship** has been securely generated and attached directly to this email.

---

<div style="background-color: #faf9f6; border: 2px double #fed7aa; padding: 20px; text-align: center; font-family: Georgia, serif; max-width: 500px; margin: 20px auto; border-radius: 4px;">
    <p style="font-size: 11px; text-transform: uppercase; text-align:center; letter-spacing: 2px; color: #15803d; font-weight: bold; margin: 0 0 5px 0;">
        ✨ Certificate of Safe Harbor ✨
    </p>
    <h2 style="font-size: 22px; color: #166534; margin: 0 0 10px 0; font-weight: bold;text-align: center;">
        Certificate of Relationship
    </h2>
    <div style="width: 80px; height: 1px; background-color: #fb923c; margin: 0 auto 15px auto;"></div>
    <p style="font-size: 16px; font-weight: bold; color: #166534; margin: 0;text-align: center;">
        {{ config('proposal.host_full_name') }} <span style="color: #f97316;">&</span> {{ $proposal->name ?? 'Sweetheart' }}
    </p>
    <p style="font-size: 12px; color: #78716c; font-style: italic; margin-top: 10px;text-align: center;">
        Bound by shared playlists, gentle conversations, and absolute safe harbors.
    </p>
</div>

---
<br>

With absolute peace and love,<br>
**{{ config('proposal.host_full_name') }}**
@endcomponent