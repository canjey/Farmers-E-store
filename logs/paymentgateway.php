
<?
$ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer s7cgOkgxcmzuUAgCWFWXtjZWBqd5',
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, {
    "BusinessShortCode": 174379,
    "Password": "MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjEwOTIwMjEwNTI5",
    "Timestamp": "20210920210529",
    "TransactionType": "CustomerPayBillOnline",
    "Amount": 1,
    "PartyA": 254700152742,
    "PartyB": 174379,
    "PhoneNumber": 254700152742,
    "CallBackURL": "https://mydomain.com/path",
    "AccountReference": "sokomkononi",
    "TransactionDesc": "Payment of X" 
  });
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response     = curl_exec($ch);
curl_close($ch);
echo $response;

1090075603131-npff2sntj3115iikqnbe7m5dadacopbk.apps.googleusercontent.com
sQeH3AkYPWR8ZUq4EJKAPpOh