<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite("resources/css/app.css")
</head>

<body class="bg-[url('/public/backgrounds/login.png')] bg-cover">
    <div class="container w-4xl mx-auto bg-white rounded-sm mt-32 flex flex-col items-center pb-8">
        <img src="logos/unj.png" alt="Logo UNJ" class="absolute left-1/2 translate-x-[-50%] w-30 top-12">
        <div class="pt-20 pb-10 px-28 w-full">
            <h1 class="text-center font-semibold text-xl">
                Manajemen Gedung dan Ruang
            </h1>
            <hr class="border-2 border-gray-200 mt-2">
            <form action="" class="flex flex-col mt-4 gap-4">
                <input type="text" placeholder="NIM/NIDN/NUPTK" class="bg-[#D9D9D9] rounded-sm py-2 px-3">
                <input type="text" placeholder="Password" class="bg-[#D9D9D9] rounded-sm py-2 px-3">
                <button class="bg-[#006369] text-white font-semibold rounded-md py-2 hover:brightness-90 cursor-pointer">
                    LOGIN
                </button>
            </form>
        </div>
    </div>
</body>

</html>
