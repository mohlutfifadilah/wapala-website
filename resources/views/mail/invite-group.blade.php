<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Recruitment Wapala {{ now()->year }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        @media screen and (max-width: 600px) {
            .content {
                width: 100% !important;
                display: block !important;
                padding: 10px !important;
            }
            .header, .body, .footer {
                padding: 20px !important;
            }
        }
    </style>
</head>
<body style="font-family: 'Poppins', Arial, sans-serif">
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
            <td align="center" style="padding: 20px;">
                <table class="content" width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border: 1px solid #cccccc;">
                    <!-- Header -->
                    <tr>
                        <td class="header" style="background-color: #345C72; padding: 30px; text-align: left; color: white; font-size: 24px;">
                        Open Recruitment Wapala {{ now()->year }}
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6; color:black;">
                        Salam Lestari ! <br>
                        Selamat kamu telah dinyatakan <b>LOLOS</b> "Open Recruitment Wapala {{ now()->year }}" dan berhak melanjutkan rangkaian selanjutnya.
                        <br><br>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $nama }}</td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td>:</td>
                                <td>{{ $nim }}</td>
                            </tr>
                            <tr>
                                <td>Program Studi</td>
                                <td>:</td>
                                <td>{{ $prodi }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><b>Calon Siswa</b></td>
                            </tr>
                        </table>
                        <br><br>
                            Untuk selanjutnya, informasi mengenai rangkaian seleksi lainnya akan diinformasikan melalui Grup Whatsapp. Kamu bisa masuk Grup Whatsapp dengan mengklik link dibawah :
                        </td>
                    </tr>

                    <!-- Call to action Button -->
                    <tr>
                        <td style="padding: 0px 40px 0px 40px; text-align: center;">
                            <!-- CTA Button -->
                            <table cellspacing="0" cellpadding="0" style="margin: auto;">
                                <tr>
                                    <td align="center" style="background-color: #345C72; padding: 10px 20px; border-radius: 5px;">
                                        <a href="{{ $link }}" target="_blank" style="color: #ffffff; text-decoration: none; font-weight: bold;">Grup Whatsapp</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                            Sekian pesan yang ingin disampaikan, maju terus pantang mundur untuk melalui rangkaian seleksi selanjutnya, Salam Lestari !
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td class="footer" style="background-color: #333333; padding: 15px; text-align: center; color: white; font-size: 14px;">
                        Copyright &copy; {{ now()->year }} | Wapala IT Telkom
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
