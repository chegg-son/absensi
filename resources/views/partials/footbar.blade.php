@push('css')
    <style>
        .footer-container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8fafc;
            color: #4a5568;
        }

        p.footer-container {
            font-size: 14px;
            font-weight: 400;
            line-height: 1.6;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #4a5568;
            margin: 0;
        }
    </style>
@endpush

<footer class="text-center text-sm">
    <div class="container">
        <p>Copyright © {{ date('Y') }}. All rights reserved.<br />Crafted with ❤️ by TEAM IT PIAT 7</p>
    </div>
</footer>
