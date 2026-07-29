<!DOCTYPE html>
<html>

<head>
    <title>Asset Assigned</title>
</head>

<body style="font-family: Arial, sans-serif;">

    <h2>Hello {{ $assignment->employee->name }},</h2>

    <p>
        An asset has been assigned to you.
    </p>

    <hr>

    <h3>Asset Details</h3>

    <table cellpadding="6">

        <tr>
            <td><strong>Asset Code</strong></td>
            <td>{{ $assignment->asset->asset_code }}</td>
        </tr>

        <tr>
            <td><strong>Asset Name</strong></td>
            <td>{{ $assignment->asset->name }}</td>
        </tr>

        <tr>
            <td><strong>Category</strong></td>
            <td>{{ $assignment->asset->category->name }}</td>
        </tr>

        <tr>
            <td><strong>Assigned Date</strong></td>
            <td>{{ $assignment->assigned_date }}</td>
        </tr>

    </table>

    <br>

    <p>
        Please take good care of the assigned asset.
    </p>

    <br>

    <p>
        Regards,<br>
        <strong>Asset Tracker System</strong>
    </p>

</body>

</html>