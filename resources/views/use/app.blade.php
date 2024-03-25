<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/logo.svg" type="">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    <title>@yield('title')</title>
</head>
<style>
    /* Reset and base styles  */
    * {
        padding: 0px;
        margin: 0px;
        border: none;
        color: inherit;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    /* Links */

    a,
    a:link,
    a:visited {
        text-decoration: none;
    }

    a:hover {
        text-decoration: none;
    }

    /* Common */

    aside,
    nav,
    footer,
    header,
    section,
    main {
        display: block;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
        font-size: inherit;
        font-weight: inherit;
    }

    ul,
    ul li {
        list-style: none;
    }

    img {
        vertical-align: top;
    }

    img,
    svg {
        max-width: 100%;
        height: auto;
    }

    address {
        font-style: normal;
    }

    /* Form */

    input,
    textarea,
    button,
    select {
        font-family: inherit;
        font-size: inherit;
        color: inherit;
        background-color: transparent;
    }

    input::-ms-clear {
        display: none;
    }

    button,
    input[type="submit"] {
        display: inline-block;
        box-shadow: none;
        background-color: transparent;
        background: none;
        cursor: pointer;
    }

    input:focus,
    input:active,
    button:focus,
    button:active {
        outline: none;
    }

    button::-moz-focus-inner {
        padding: 0;
        border: 0;
    }

    label {
        cursor: pointer;
    }

    legend {
        display: block;
    }
</style>

<body>
    <livewire:counter />
    @include('layout.header')
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    @livewireScripts
</body>

</html>
