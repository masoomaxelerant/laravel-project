<x-layout>
  <div class="container mx-auto p-4">
    <h1 class="mt-2 text-5xl tracking-tight sm:text-4xl text-pretty">Welcome, Calculate Your BMI!</h1>
    <p class="m-4 text-sm font-co font-semibold">Body Mass Index (BMI) is a simple calculation used to estimate whether
      a person’s weight is appropriate for their height. It is commonly applied to adult men and women as a general
      indicator of body fat levels. However, BMI does not provide a complete picture of an individual’s health. Since it
      only considers height and weight, it does not account for factors such as muscle mass, bone strength, or overall
      body composition. Therefore, a healthcare professional will evaluate your BMI along with other health indicators
      to determine whether it falls within a healthy range for you.</p>


    <div class="max-w-7xl mx-auto pt-6">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow overflow-hidden">
          <div class="flex items-center justify-between px-6 py-4 bg-gray-800">
            <h3 class="text-lg font-semibold text-white">BMI Calculator</h3>
          </div>

          <h3 class="text-lg font-semibold p-2">BMI Calculator</h3>
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-600">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <form action="{{ route('calculate') }}" class="p-4" method="POST">
            @csrf
            <div class="col-span-full space-y-6">

              <!-- Age -->
              <div>
                <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Age</label>
                <input type="text" id="age" name="age" value="{{ old('age') }}" placeholder="Enter your age between 18 and 99"
                  class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                <x-form.error name="age" />
              </div>

              <!-- Gender -->
              <div>
                <span class="block text-sm font-medium text-gray-700 mb-2">Gender</span>

                <div class="flex items-center space-x-6">
                  <label class="inline-flex items-center">
                    <input type="radio" id="male" name="gender" value="male"
                      class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" {{ old('gender') === 'male' ? 'checked' : '' }} />
                    <span class="ml-2 text-sm text-gray-700">Male</span>
                  </label>

                  <label class="inline-flex items-center">
                    <input type="radio" id="female" name="gender" value="female"
                      class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" {{ old('gender') === 'female' ? 'checked' : '' }} />
                    <span class="ml-2 text-sm text-gray-700">Female</span>
                  </label>
                  <x-form.error name="gender" />
                </div>
              </div>

              <!-- Height -->
              <div>
                <label for="height" class="block text-sm font-medium text-gray-700 mb-1">Height (cm)</label>
                <input type="text" id="height" name="height" value="{{ old('height') }}" placeholder="Enter your height between 100 and 250 cm"
                  class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                <x-form.error name="height" />
              </div>

              <!-- Weight -->
              <div>
                <label for="weight" class="block text-sm font-medium text-gray-700 mb-1">Weight (kg)</label>
                <input type="text" id="weight" name="weight" value="{{ old('weight') }}" placeholder="Enter your weight between 30 and 200 kg"
                  class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                <x-form.error name="weight" />
              </div>

              <!-- Submit -->
              <div>
                <button type="submit"
                  class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-5 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                  Submit
                </button>
              </div>

            </div>
          </form>
        </div>
        <!-- Right: Result Panel -->
        <aside class="bg-white rounded-lg shadow overflow-hidden">
          <!-- Header -->
          <div class="flex items-center justify-between px-6 py-4 bg-gray-800">
            <h3 class="text-lg font-semibold text-white">Result</h3>
          </div>

          <div class="p-6 space-y-6">

            <!-- Top line: BMI + tag -->
            <div class="flex flex-wrap items-end justify-between gap-3">
              <div>
                <div class="text-sm text-gray-500">Your BMI</div>
                <div class="text-3xl font-extrabold text-gray-900">
                  {{ number_format((session('bmi') ? session('bmi') : 0), 1) }}
                  <span class="text-base font-semibold text-gray-500">kg/m²</span>
                </div>
              </div>

              <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold {{ session('categoryClass', 'text-gray-700 bg-gray-100') }}">
                {{ session('category', 'Unknown') }}
              </span>
            </div>

            <!-- Original visual indicator (segmented range + pointer) -->
            <div>
              <div class="flex items-center justify-between text-xs text-gray-500 mb-2">
                <span>Under</span>
                <span>Normal</span>
                <span>Over</span>
                <span>High</span>
              </div>

              <div class="relative">
                <!-- Segmented bar -->
                <div class="h-5 rounded-full overflow-hidden bg-gray-200 flex">
                  <div class="w-1/4 bg-yellow-400"></div>
                  <div class="w-1/4 bg-green-500"></div>
                  <div class="w-1/4 bg-orange-400"></div>
                  <div class="w-1/4 bg-red-500"></div>
                </div>

                <!-- Pointer -->
                <div class="absolute -top-2 transform -translate-x-1/2" style="left: {{ session('posPercent', 0) }}%;"
                  aria-label="BMI position marker" title="BMI: {{ number_format((session('bmi') ? session('bmi') : 0), 1) }}">
                  <div class="w-0 h-0 border-l-8 border-r-8 border-b-8 border-transparent border-b-gray-900"></div>
                  <div class="mx-auto mt-1 h-3 w-3 rounded-full bg-gray-900"></div>
                </div>

                <!-- Scale labels -->
                <div class="flex justify-between text-xs text-gray-500 mt-2">
                  <span>{{ session('rangeMin', 0) }}</span>
                  <span>{{ session('rangeMax', 0) }}</span>
                </div>
              </div>
            </div>

            <!-- Details list -->
            <div class="border-t pt-4">
              <ul class="space-y-2 text-sm text-gray-700">
                <li class="flex items-start justify-between gap-3">
                  <span class="text-gray-500">Healthy BMI range</span>
                  <span class="font-medium">18.5 – 24.9 kg/m²</span>
                </li>

                <li class="flex items-start justify-between gap-3">
                  <span class="text-gray-500">Healthy weight range (example)</span>
                  <span class="font-medium">
                    {{ session('healthyMin', '59.9') }} – {{ session('healthyMax', '81.0') }} kg
                  </span>
                </li>

                <li class="flex items-start justify-between gap-3">
                  <span class="text-gray-500">BMI Prime</span>
                  <span class="font-medium">{{ session('bmiPrime', '0.8') }}</span>
                </li>

                <li class="flex items-start justify-between gap-3">
                  <span class="text-gray-500">Ponderal Index</span>
                  <span class="font-medium">{{ session('ponderal', '11.1') }} kg/m³</span>
                </li>
              </ul>
            </div>

            <!-- Copyright-safe footer (your own text, no copying) -->
            <div class="text-xs text-gray-500">
              This BMI display is an original UI component. BMI is a screening tool and does not diagnose body fatness
              or health.
              For personal medical advice, consult a qualified healthcare professional.
            </div>
          </div>
        </aside>

      </div>
    </div>
  </div>
</x-layout>