<table class="studentData">
    <tbody>
    @foreach ($studentInfo as $key => $student)
        <tr>
            <td>{{ $studentInfo->firstItem()+$key }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->roll_number }}</td>
            <td>{{ $student->phone_number }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->bloodGroup->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
