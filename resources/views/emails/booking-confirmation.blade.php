<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Booking Confirmed</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f6f7fb; padding:20px;">
    <table width="100%">
        <tr>
            <td align="center">
                <table width="600" style="background:#ffffff; border-radius:12px; padding:30px;">
                    <tr>
                        <td align="center">

                            <h2 style="color:#4f46e5;">Booking Confirmed 🎉</h2>

                            <p>Hi <strong>{{ $name }}</strong>,</p>

                            <p>Your appointment has been successfully booked.</p>

                            <table style="margin:20px auto;">
                                <tr>
                                    <td><strong>Date:</strong></td>
                                    <td style="padding-left:10px;">{{ $date }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Time:</strong></td>
                                    <td style="padding-left:10px;">{{ $start_time }} – {{ $end_time }}</td>
                                </tr>
                            </table>

                            <p style="color:#666;">Thank you for using our scheduling service.</p>

                            <p style="font-size:12px; color:#999;">
                                © {{ date('Y') }} Appointment Scheduler
                            </p>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>