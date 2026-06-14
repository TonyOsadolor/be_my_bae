<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Relationship Certificate</title>
    <style>
        /* Define standard landscape A4 dimensions and print margins */
        @page {
            size: A4 landscape;
            margin: 0;
        }
        body {
            font-family: 'Georgia', 'Times New Roman', Times, serif;
            background-color: #faf9f6;
            margin: 0;
            padding: 40px;
            color: #44403c;
        }
        
        /* Main Certificate Outer Box */
        .certificate-container {
            border: 6px double #fed7aa;
            padding: 8px;
            background-color: #ffffff;
            height: 94%;
        }

        /* Inner Accent Border Wrapper */
        .inner-border {
            border: 1px solid rgba(22, 101, 52, 0.3);
            padding: 45px 30px;
            position: relative;
            height: 84%;
            text-align: center;
        }

        /* Elegant Corner Accents */
        .corner {
            position: absolute;
            width: 30px;
            height: 30px;
        }
        .top-left     { top: 10px; left: 10px; border-top: 2px solid #fb923c; border-left: 2px solid #fb923c; }
        .top-right    { top: 10px; right: 10px; border-top: 2px solid #fb923c; border-right: 2px solid #fb923c; }
        .bottom-left  { bottom: 10px; left: 10px; border-b: 2px solid #fb923c; border-left: 2px solid #fb923c; border-bottom: 2px solid #fb923c; }
        .bottom-right { bottom: 10px; right: 10px; border-b: 2px solid #fb923c; border-right: 2px solid #fb923c; border-bottom: 2px solid #fb923c; }

        /* Typography Styles */
        .subtitle {
            font-family: 'Arial', sans-serif;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: #15803d;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .pdf-emoji {
            width: 14px;
            height: 14px;
            vertical-align: middle;
            margin: 0 4px;
        }
        .seal-emoji-img {
            width: 32px;
            height: 32px;
            margin-bottom: 4px;
        }
        .title {
            font-size: 42px;
            font-weight: bold;
            color: #166534;
            margin: 0 auto 15px auto;
            letter-spacing: 1px;
        }
        .divider {
            width: 150px;
            height: 2px;
            background-color: #fb923c;
            margin: 0 auto 25px auto;
        }
        .intro-text {
            font-style: italic;
            font-size: 18px;
            color: #78716c; /* stone-500 */
            margin-bottom: 25px;
        }

        /* Layout structure utilizing bulletproof HTML Tables instead of Flexbox */
        .names-table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        .name-holder {
            font-size: 28px;
            font-weight: 900;
            color: #166534;
            border-bottom: 2px solid #d6d3d1;
            width: 40%;
            padding-bottom: 5px;
            text-align: center;
        }
        .name-host {
            text-align: right;
            padding-right: 80px;
        }
        .name-partner {
            color: #ea580c;
            text-align: left;
            padding-left: 60px;
        }
        .ampersand {
            font-size: 24px;
            color: #f97316;
            font-family: 'Arial', sans-serif;
            width: 10%;
            text-align: center;
        }

        .body-narrative {
            font-size: 15px;
            line-height: 1.6;
            color: #44403c;
            max-width: 650px;
            margin: 25px auto;
            padding: 0 40px;
        }

        /* Footer Signature Component Layout */
        .footer-table {
            width: 100%;
            margin-top: 40px;
            border-collapse: collapse;
        }
        .signature-line {
            border-bottom: 1px solid #e7e5e4;
            font-size: 18px;
            font-style: italic;
            padding-bottom: 5px;
            width: 35%;
            text-align: center;
        }
        .sig-host { color: #15803d; }
        .sig-partner { color: #ea580c; }
        
        .signature-title {
            font-family: 'Arial', sans-serif;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #a8a29e;
            padding-top: 5px;
            font-weight: bold;
            text-align: center;
        }

        /* Decorative Lock-In Seal */
        .seal-container {
            width: 30%;
            text-align: center;
        }
        .seal {
            width: 85px;
            height: 85px;
            border: 2px dashed rgba(249, 115, 22, 0.6);
            background-color: #fff7ed;
            border-radius: 50%;
            margin: 0 auto;
            padding-top: 10px;
            box-sizing: border-box;
        }
        .seal-emoji { font-size: 20px; display: block; }
        .seal-text {
            font-family: 'Arial', sans-serif;
            font-size: 9px;
            font-weight: bold;
            color: #c2410c;
            letter-spacing: 0.5px;
            display: block;
        }

        .date-footer {
            font-family: 'Arial', sans-serif;
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #a8a29e;
            margin-top: 35px;
        }
    </style>
</head>
<body>

    <div class="certificate-container">
        <div class="inner-border">
            
            <div class="corner top-left"></div>
            <div class="corner top-right"></div>
            <div class="corner bottom-left"></div>
            <div class="corner bottom-right"></div>

            <div class="subtitle">
                <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/2728.svg" class="pdf-emoji" alt="sparkle"> 
                Certificate of Safe Harbor 
                <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/2728.svg" class="pdf-emoji" alt="sparkle">
            </div>
            <div class="title">Certificate of Relationship</div>
            <div class="divider"></div>

            <div class="intro-text">This document proudly honors and declares that</div>

            <table class="names-table">
                <tr>
                    <td class="name-holder name-host">{{ config('proposal.host_full_name') }}</td>
                    <td class="ampersand">&</td>
                    <td class="name-holder name-partner">{{ $proposal->name ?? 'Sweetheart' }}</td>
                </tr>
            </table>

            <p class="body-narrative">
                Have mutually chosen to drop all performance, silence the noise of the outside world, 
                and step forward as an unbreakable team. Bound by shared playlists, gentle conversations, 
                and absolute safe harbors they promise to walk side-by-side at a peaceful rhythm.
            </p>

            <table class="footer-table">
                <tr>
                    <td class="signature-line sig-host">{{ config('proposal.host_full_name') }}</td>
                    
                    <td class="seal-container">
                        <div class="seal">
                            <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f942.svg" class="seal-emoji-img" alt="cheers"><br>
                            <span class="seal-text">LOCKED IN</span>
                        </div>
                    </td>
                    
                    <td class="signature-line sig-partner">{{ $proposal->name ?? 'Sweetheart' }}</td>
                </tr>
                <tr>
                    <td class="signature-title">The Initiator</td>
                    <td></td> <td class="signature-title">The Companion</td>
                </tr>
            </table>

            <div class="date-footer">
                Established this {{ \Carbon\Carbon::parse($selectedDate ?? now())->format('jS \d\a\y \o\f F, Y') }}
            </div>

        </div>
    </div>

</body>
</html>