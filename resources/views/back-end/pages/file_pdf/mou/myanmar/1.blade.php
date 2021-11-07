<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        body {
            font-family: "THSarabunNew";
        }
        p{
            position:fixed;color:red;
        }
    </style>
    @php
        $thaiweek=array("วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัส","วันศุกร์","วันเสาร์");
        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
 @endphp
</head>
<body style="top:0;left:0">
    <div style="page-break-after:always;">
        <img src="backend/images/mou/myanmar/แจ้งที่พัก/แจ้งที่พัก_page-0001.jpg" style="margin:-45px;position:fixed;width:800px" alt="">
        <p style="margin:98px 520px">1</p>
        <p style="margin:148px 400px">{{date("d")}}</p>
        <p style="margin:148px 495px">{{$thaimonth[date("m")-1]}}</p>
        <p style="margin:148px 620px">{{date("Y")+543}}</p>
        <p style="margin:242px 140px">{{$resultr->name_th}}  {{$resultr->surname_th}}</p>
        <p style="margin:242px 600px">{{$resultr->age}}</p>
        <p style="margin:280px 100px">{{$result->country}}</p>
        <p style="margin:280px 290px">{{$resultr->address_th}}</p>
        <p style="margin:280px 510px">9</p>
        <p style="margin:318px 100px">{{$resultr->road_th}}</p>
        <p style="margin:318px 320px">{{$rowesd->name_th}}</p>
        <p style="margin:318px 510px">{{$rowed->name_th}}</p>
        <p style="margin:360px 100px">{{$rowep->name_th}}</p>
        <p style="margin:395px 230px">14</p>
        <p style="margin:395px 460px">15</p>
        <p style="margin:435px 100px">16</p>
        <p style="margin:435px 270px">17</p>
        <p style="margin:435px 460px">18</p>
        <p style="margin:473px 100px">19</p>
        <p style="margin:473px 270px">20</p>
        <p style="margin:473px 400px">21</p>
        <p style="margin:473px 590px">22</p>
        <p style="margin:510px 100px">23</p>
        <p style="margin:835px 200px">24</p>
        <p style="margin:835px 590px">25</p>
        <p style="margin:877px 320px">26</p>
        <p style="margin:877px 590px">27</p>
        <p style="margin:915px 250px">28</p>
        <p style="margin:915px 500px">29</p>
        <p style="margin:952px 90px">30</p>
        <p style="margin:952px 210px">31</p>
        <p style="margin:952px 365px">32</p>
        <p style="margin:952px 500px">33</p>
        
    </div>
    <div style="page-break-after:unset;">
        <img src="backend/images/mou/myanmar/แจ้งที่พัก/แจ้งที่พัก_page-0002.jpg" style="margin:-45px;position:fixed;width:800px;margin-top:-45px" alt="">
        <p style="margin:15px 250px">1</p>
        <p style="margin:120px 250px">2</p>
        <p style="margin:240px 250px">3</p>
        <p style="margin:350px 250px">4</p>
        <p style="margin:460px 250px">5</p>
        <p style="margin:580px 250px">6</p>
        <p style="margin:670px 250px">7</p>
        <p style="margin:750px 250px">8</p>
        <p style="margin:840px 250px">9</p>
        <p style="margin:950px 250px">10</p>
        <p style="margin:1003px 250px">11</p>
    </div>
</body>
</html>