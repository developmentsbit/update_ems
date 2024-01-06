
@if ($data)
@foreach ($data as $s)
<tr>
    <td>{{$i++}}</td>
    <td>
        {{ $s->student_id }}
        <input type="hidden" name="student_id[]" id="student_id-{{ $s->student_id }}" value="{{ $s->student_id }}">
    </td>
    <td>
        {{ $s->student_name }}
    </td>
    <td>
        {{ $s->total }}
    </td>
    <td>
        <input type="number" class="form-control form-control-sm" onkeyup="getTotalMarks({{ $s->student_id }});CheckingNumber({{ $s->student_id }})" id="mcq-{{ $s->student_id }}" name="mcq[]" value="{{ $s->mcq }}" required>
    </td>
    <td>
        <input type="number" class="form-control form-control-sm" onkeyup="getTotalMarks({{ $s->student_id }});CheckingNumber({{ $s->student_id }})" id="written-{{ $s->student_id }}" name="written[]" value="{{ $s->written }}" required>
    </td>
    <td>
        <input type="number" class="form-control form-control-sm" onkeyup="getTotalMarks({{ $s->student_id }});CheckingNumber({{ $s->student_id }})" id="practical-{{ $s->student_id }}" name="practical[]" value="{{ $s->practical }}">
    </td>
    <td>
        <input type="number" class="form-control form-control-sm" onkeyup="getTotalMarks({{ $s->student_id }});CheckingNumber({{ $s->student_id }})" id="count_asses-{{ $s->student_id }}" name="count_asses[]" value="{{ $s->count_asses }}">
    </td>
    <td>
        <input type="number" class="form-control form-control-sm @if($s->total > 33) bg-success text-light @endif" id="obtain_marks-{{ $s->student_id }}" name="obtain_marks[]" value="{{ $s->total }}" >
    </td>
    <td>
        <input type="text" class="form-control form-control-sm @if($s->total > 33) bg-success text-light @endif " id="letter_grade-{{ $s->student_id }}" name="letter_grade[]" value="A+">
    </td>
</tr>
@endforeach
@endif
