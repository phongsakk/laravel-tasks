<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Phongsak's Online Training Courses System</title>

  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

</head>

<body>
  <div class="container-flex">
    <div class="card">
      <div class="card-avatar">
        <img alt="avatar"
          src="https://scontent.fbkk12-4.fna.fbcdn.net/v/t39.30808-6/242486766_3056960974631640_8273900369541454072_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeErGgRFwAwFThmC8jsG-QZyWRyXOG8OPoNZHJc4bw4-gwhb3I2tm2wnEPtg1gELDcHAwX9YGwzxWcrvtB-Bv3lN&_nc_ohc=PiIGP6qeCzwAX8AGBqO&tn=q7WWNpyPTDd2Ohd9&_nc_zt=23&_nc_ht=scontent.fbkk12-4.fna&oh=00_AT_TNkQFIILKhfQBHoDE9wHPJAC60kaa0cqiKlBl0F37aA&oe=63048D11">
      </div>
      <div class="card-body">
        <div class="card-header">
          Phongsak's Online Training Courses System. (API)
        </div>
        <div class="card-content">
          <ul>
            <li>คอสฝึกอบรมแบบออนไลน์</li>
            <li>ผ่านการฝึกอบรมและรับใบประกาศนียบัตร</li>
          </ul>
        </div>
        <div class='btn-group'>
          <a href="{{ env('FRONTEND_URL') }}" class='btn'>เข้าสู่เว็บไซต์</a>
        </div>
      </div>
    </div>

  </div>

  {{-- Javascript --}}
  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
