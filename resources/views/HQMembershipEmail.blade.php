<h2>Kembara Meals Automate Monthly Reminder</h2>
<br/>
<img src="https://kembarabusiness.com/assets/img/kembara-logo-depan.png" style="margin-left:100px; height: 200px;">
<p>We noticed that <span style="color: red"> {{$user->name}} </span> haven't restock your product for 3 months. Details as below:</p>
<br/>
<table style="margin-left: 100px">
    <tr>
        <td>Name</td>
        <td>:</td>
        <td>{{$user->name}}</td>
    </tr>
    <tr>
        <td>Membership</td>
        <td>:</td>
        <td>KM{{str_pad($agent->member_no, 5, '0', STR_PAD_LEFT)}}</td>
    </tr>
    <tr>
        <td>Phone No</td>
        <td>:</td>
        <td>{{$user->phone_no}}</td>
    </tr>
</table>
<br/>
<p>Please kindly contact them to ensure they remain active as your agent.</p>
<br/>
Thank You,
<br/>
<b>Kembara Meals HQ</b>
<br/>
<b>No. CS23A, Jalan Puteri 2A/6, 43000 Kajang, Selangor</b>
<br/>
<b>019-868 6297</b>

<br/>
<br/>
<p>**************************************************************************</p>
<p>
    Please do not reply to this email as it was automatically generated.
</p>
<p>**************************************************************************</p>
