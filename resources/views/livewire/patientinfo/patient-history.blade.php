<div>
    @if($dataFromSession > 0)
    <div  class="max-w-xxl mx-auto sm:px-6 lg:px-8 space-y-6  @if($dataFromSession > 0) animate__animated animate__fadeInLeft @endif">
            <div class="p-4 sm:p-8 bg-white dark:bg-white-800 shadow sm:rounded-lg ">
                <div class="max-w-xxl mx-auto ">
                    <h1 class="py-3 font-bold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Patient History ({{$patientName}})
                    </h1>
                    
                    <!-- History Data -->
                   
                    <div class="relative overflow-x-auto ">
                    @if($patientRecordCount <= 0)
                    <h1 class="font-bold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    No Record
                    </h1>
                    @else
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Record #
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Eye Location
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Sphere
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Cylinder
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        axis
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        VA
                                                    </th>
                                                    
                                                    <th scope="col" class="px-6 py-3">
                                                        Add
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Notes
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        PD
                                                    </th>
                                                </tr>
                                    </thead>
                                    <tbody>
                                    

                                        @foreach($historyData as $patient)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                             <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                               # {{$patient->id}}

                                            </th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Oculus Sinister(Left Eye)

                                            </th>
                                            @foreach($patient->oculussinisters as $osdata)
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$osdata->os_sphere}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$osdata->os_cylinder}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$osdata->os_axis}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$osdata->os_va}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$osdata->os_add}}

                                                </th>
                                            @endforeach
                                        </tr>
                                        <tr class="bg-white-50 dark:bg-gray-800">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                           

                                            </th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Oculus Dexter(Right Eye)

                                            </th>
                                        @foreach($patient->oculusdexters as $oddata)
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$oddata->od_sphere}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$oddata->od_cylinder}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$oddata->od_axis}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$oddata->od_va}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$oddata->od_add}}

                                                </th>
                                            @endforeach
                                        </tr>
                                        <tr class="bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                @foreach($patient->doctors as $doctor)
                                                    Attending Doctor: {{$doctor->doctor_fname.' '.$doctor->doctor_lname}}
                                                @endforeach
                                            </th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Date: {{ date_format($patient->created_at,"M. d,Y")}}
                                            </th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$patient->pr_notes}}
                                            </th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$patient->pr_pd}}
                                            </th>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                        @endif
                        </div>
                </div>
            </div>
        </div>

    @endif
</div>
