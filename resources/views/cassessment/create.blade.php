@extends('layouts.app')

@section('title', 'Create Outcomes Courses')

@section('contents')
    <h1 class="mb-0">Add Course Assessment</h1>
    <hr />
    <form action="{{ route('cassessments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            {{-- <div class="col">
                <input type="text" name="id" class="form-control" placeholder="ID">
            </div> --}}
            <div class="col">

                <select name="pid" id="pid" onchange="programchange()"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state">
                    <option value="">--Select Program--</option>
                    @foreach ($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->pname }}</option>
                    @endforeach
                </select>




                <select name="c_code" id="c_code" onchange="coursechange()"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state">
                    <option value="">--Select Course--</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->code }}">{{ $course->cname }}</option>
                    @endforeach
                </select>

  <select name="year" id="year" onchange="yearchange()"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state">
                    <option value="">--Select Year--</option>
                    @foreach ($cefforing as $ceffor)
                        <option value="{{ $ceffor->year }}">{{ $ceffor->year }}</option>
                    @endforeach
                </select>

                <select name="semester" id="semester"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state">
                    <option value="">--Select Semester--</option>
                    @foreach ($cefforing as $ceffor)
                        <option value="{{ $ceffor->semester }}">{{ $ceffor->semester }}</option>
                    @endforeach
                </select>


            </div>
            {{-- <div class="row">
                <div class="input-group">
                    <select name="abet_code" class="input-group-text" id="grid-state">
                        <option value="">--Select Outcome--</option>
                        @foreach ($outcomes as $outcome)
                            <option value="{{ $outcome->abet_code }}">{{ $outcome->abet_code }}</option>
                        @endforeach

                    </select>
                    <input  type="text" name="p_num"  placeholder="P%" aria-label="First name" class="form-control">
                    <input type="text" name="avg_num"  placeholder="AVG" aria-label="Last name" class="form-control">
                  </div> --}}
            {{-- <select name="abet_code" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option value="">--Select Outcome--</option>
                @foreach ($outcomes as $outcome)
                    <option value="{{ $outcome->abet_code }}">{{ $outcome->abet_code }}</option>
                @endforeach
                 <input type="text" name="p_num" class="form-control" placeholder="P%">
            <input type="text" name="avg_num" class="form-control" placeholder="AVG">
            </select> --}}

            <div class="row" style="box-sizing: border-box; margin: 10px 12px">

                <div class="input-group">
                    <select name="abet_code[]" class="input-group-text" id="grid-state">
                        <option value="">--Select Outcome--</option>
                        @foreach ($outcomes as $outcome)
                            <option value="{{ $outcome->abet_code }}">{{ $outcome->abet_code }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="p_num[]" placeholder="P%" aria-label="First name" class="form-control">
                    <input type="text" name="avg_num[]" placeholder="AVG" aria-label="Last name" class="form-control">
                </div>

                <!-- You can repeat this group of fields for multiple outcomes -->
                <!-- For example, add a new group of fields for another outcome -->
                <div class="input-group">
                    <select name="abet_code[]" class="input-group-text" id="grid-state">
                        <option value="">--Select Outcome--</option>
                        @foreach ($outcomes as $outcome)
                            <option value="{{ $outcome->abet_code }}">{{ $outcome->abet_code }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="p_num[]" placeholder="P%" aria-label="First name" class="form-control">
                    <input type="text" name="avg_num[]" placeholder="AVG" aria-label="Last name" class="form-control">
                </div>

                <!-- You can add more groups of fields as needed -->

                <div class="input-group">
                    <select name="abet_code[]" class="input-group-text" id="grid-state">
                        <option value="">--Select Outcome--</option>
                        @foreach ($outcomes as $outcome)
                            <option value="{{ $outcome->abet_code }}">{{ $outcome->abet_code }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="p_num[]" placeholder="P%" aria-label="First name" class="form-control">
                    <input type="text" name="avg_num[]" placeholder="AVG" aria-label="Last name" class="form-control">
                </div>

                <!-- You can repeat this group of fields for multiple outcomes -->
                <!-- For example, add a new group of fields for another outcome -->
                <div class="input-group">
                    <select name="abet_code[]" class="input-group-text" id="grid-state">
                        <option value="">--Select Outcome--</option>
                        @foreach ($outcomes as $outcome)
                            <option value="{{ $outcome->abet_code }}">{{ $outcome->abet_code }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="p_num[]" placeholder="P%" aria-label="First name" class="form-control">
                    <input type="text" name="avg_num[]" placeholder="AVG" aria-label="Last name" class="form-control">
                </div>

                <div class="input-group">
                    <select name="abet_code[]" class="input-group-text" id="grid-state">
                        <option value="">--Select Outcome--</option>
                        @foreach ($outcomes as $outcome)
                            <option value="{{ $outcome->abet_code }}">{{ $outcome->abet_code }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="p_num[]" placeholder="P%" aria-label="First name" class="form-control">
                    <input type="text" name="avg_num[]" placeholder="AVG" aria-label="Last name" class="form-control">
                </div>

                <!-- You can repeat this group of fields for multiple outcomes -->
                <!-- For example, add a new group of fields for another outcome -->
                <div class="input-group">
                    <select name="abet_code[]" class="input-group-text" id="grid-state">
                        <option value="">--Select Outcome--</option>
                        @foreach ($outcomes as $outcome)
                            <option value="{{ $outcome->abet_code }}">{{ $outcome->abet_code }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="p_num[]" placeholder="P%" aria-label="First name" class="form-control">
                    <input type="text" name="avg_num[]" placeholder="AVG" aria-label="Last name" class="form-control">
                </div>
            </div>




        <div class="row" style="box-sizing: border-box; margin: 0px 12px">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
@section('pagespecifiscripts')

    <script type="text/javascript">
        function programchange() {

            var id = $('#pid').val();

            //alert(id);
            // Empty the dropdown
            $('#c_code').find('option').not(':first').remove();
            // $('#abet_code').find('option').not(':first').remove();


            // AJAX request
            $.ajax({
                url: '{{ url('cassessments/showcourses') }}/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {

                            var id = response['data'][i].code;
                            var name = response['data'][i].cname;
                            //  var name = response['data'][i].abet_code;


                            var option = "<option value='" + id + "'>" + name + "</option>";

                            $("#c_code").append(option);
                            //  $("#abet_code").append(option);

                        }
                    }

                }
            });

        }




        function coursechange() {

        var id = $('#c_code').val();

            //alert(id);
            // Empty the dropdown
            $('#year').find('option').not(':first').remove();


            // AJAX request
            $.ajax({
                url: '{{ url('cassessments/showyears') }}/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {

                            // var id = response['data'][i].year;
                            var name = response['data'][i].year;
                            //  var name = response['data'][i].abet_code;


                            var option = "<option value='" + name + "'>" + name + "</option>";

                            $("#year").append(option);
                            //  $("#abet_code").append(option);

                        }
                    }

                }
            });

            }

        function yearchange() {

            var id = $('#c_code').val();

            //alert(id);
            // Empty the dropdown
            $('#semester').find('option').not(':first').remove();


            // AJAX request
            $.ajax({
            url: '{{ url('cassessments/showsemesters') }}/' + id,
            type: 'get',
            dataType: 'json',
            success: function(response) {
            var len = 0;
            if (response['data'] != null) {
                len = response['data'].length;
            }

            if (len > 0) {
                for (var i = 0; i < len; i++) {

                    // var id = response['data'][i].year;
                    var name = response['data'][i].semester;
                    //  var name = response['data'][i].abet_code;


                    var option = "<option value='" + name + "'>" + name + "</option>";

                    $("#semester").append(option);
                    //  $("#abet_code").append(option);

                }
            }

            }
            });

}
    </script>
@endsection
