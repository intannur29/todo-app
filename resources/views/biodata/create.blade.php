<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "poppins", sans-serif;
        }

        .container {
            width: 100%;
            height: 100vh;
            background-image: url('{{ asset('/assets/img/coala.jpg') }}');
            background-position: center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 90%;
            height: 440px;
            color: #fff;
            text-align: center;
            padding: 50px 35px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.2);
            border-radius: 360x;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
        }

        .card img {
            width: 140px;
            border-radius: 50%;
        }

        .card h2 {
            font-size: 40px;
            font-weight: 400;
            margin-top: 20px;
        }

        .card p {
            font-size: 18px;
            margin: 10px auto;
            max-width: 330px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <a class="nav-link">
                <img class="rounded-circle me-lg-2" src="/assets/img/fotoijazahintan.jpeg" alt=""
                    style="width: 250px; height: 180px" />
                <span class="d-none d-lg-inline-flex"></span>
            </a>
            <div className="flex items-center">
                <table border="4" class="d-flex align-items-center justify-content center">
                    <tbody>
                        <tr>
                            <td class="text-dark">Nama : Intan Nur Rahmawati</td>
                        </tr>
                        <tr>
                            <td>NIT : 2223599</td>
                        </tr>
                        <tr>
                            <td>Ttl : Subang, 24-April-2006</td>
                        </tr>
                        <tr>
                            <td>Kelas : XII</td>
                        </tr>
                        <tr>
                            <td>Jurusan : Rekayasa Perangkat Lunak</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

</body>


</html>
