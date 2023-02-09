<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Courses Groups') }}
        </h2>
    </x-slot>
    <style>
        .images-container {
        display: flex;
        flex-wrap: wrap;
    }
    
      </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (Session::has('msg'))
                <div id="alert-border-3" class="flex p-4 mb-4 text-green-700 bg-green-100 border-t-4 border-green-500 dark:text-green-400 dark:bg-gray-800" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium">
                        {!! \Session::get('msg') !!}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-300 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
                      <span class="sr-only">Dismiss</span>
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
              @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table id="results" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
<div class="grid grid-rows-2 grid-flow-col gap-2">
 <div>
    

 </div>
</div>   
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                   Course Name
                </th>    
                  <th scope="col" class="px-6 py-3">
                    Students
                  </th>     
                  <th scope="col" class="px-6 py-3">
                    Actions
                  </th>  
            </tr>
        </thead>
        <tbody>
          @foreach ($coursesGroups as $course_id => $courseTeachers)
              <tr>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$course_id}}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$courseTeachers->first()->course->name}}
                </th>
                <td class="px-6 py-4">
                  <div class="images-container">
                    @php
                    $students = $courseTeachers->pluck('students.name');
                    $studentsString = $students->toArray();
                    $studentsString=array_unique($studentsString);
                    @endphp
                    @foreach ($studentsString as $student)
                      {{$student}},
                    @endforeach
                  </div>
                </td>
                <td class="px-6 py-4 text-right text-center">
                  {{-- <a data-modal-toggle="popup-modal{{$course_id}}"  class="float-left font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a> --}}
              </td>
              </tr>
            @endforeach
          </tbody>
    </table>
    {{$coursesGroups->links()}}
</div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>