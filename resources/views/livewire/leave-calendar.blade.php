<div x-data="calendar()"

x-init="init()">
    <div class="  w-[60rem] mt-20 ms-20">
        <div class="bg-white shadow-lg rounded-lg">
            <!-- Calendar header showing selected month and year -->
            <h3 class="text-center text-xl font-semibold py-3 bg-blue-500 text-white rounded-t-lg" x-text="monthAndYear"></h3>
<h1 class=" font-bold text-3xl text-center mt-8" > 
    Attendance  Days - {{$totalAttDays }}
</h1>
            <!-- Calendar Table -->
            <table class="w-full table-auto text-center mt-8">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2">Sun</th>
                        <th class="py-2">Mon</th>
                        <th class="py-2">Tue</th>
                        <th class="py-2">Wed</th>
                        <th class="py-2">Thu</th>
                        <th class="py-2">Fri</th>
                        <th class="py-2">Sat</th>
                    </tr>
                </thead>
                <tbody id="calendar-body">
                    <template x-for="(week, i) in calendar" :key="i">
                        <tr>
                            <template x-for="(day, j) in week" :key="j">
                                <td x-text="day"
                                    :class="{'bg-blue-500 text-white': isAttend(day)}"
                                    class="py-2 border border-gray-300"
                                    {{-- @click="$wire.storeAttendance(day)" --}}
                                 @click="toggleDay(day)"
                                    {{-- @click ="$wire.storeAttendance(day)" --}}
                                    >
                                </td>
                            </template>
                            
                            
                        </tr>
                    </template>
                </tbody>
            </table>

            <!-- Month input with Alpine.js model binding and Livewire sync -->
            <input type="month" x-model="selectedMonth" @change="updateCalendar(); $wire.updateMonth(selectedMonth)">
        </div>

        <!-- Hidden Year and Month Inputs -->
        <input type="hidden" x-model="selectedYear">
        <input type="hidden" x-model="selectedMonth">
    </div>
</div>

<script>
    function calendar() {
        return {
            months: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            selectedMonth: @entangle('selectedMonth'),  // Using Livewire's entangle for binding
            selectedDays : @entangle('attDays'),
            selectedYear: new Date().getFullYear(),  // Default to current year
            monthAndYear: "", // Displayed month and year string
            calendar: [], // Array to hold the weeks of the current month
            // selectedDays: @json($attDays),

            init() {
                this.updateCalendar();
            },


         



            updateCalendar() {
                const month = this.selectedMonth.split('-')[1] - 1; // Get the numeric month
                const year = this.selectedMonth.split('-')[0]; // Get the year
                this.monthAndYear = `${this.months[month]} ${year}`;

                let firstDay = new Date(year, month).getDay();
                let daysInMonth = new Date(year, month + 1, 0).getDate(); // Get number of days in the month

                this.calendar = [];
                let week = [];
                let date = 1;

                // Fill the calendar with empty days for padding
                for (let i = 0; i < 6; i++) {  // Max 6 rows (weeks) in a month
                    week = [];
                    for (let j = 0; j < 7; j++) {
                        if (i === 0 && j < firstDay) {
                            week.push("");  // Empty cells for days before the first of the month
                        } else if (date > daysInMonth) {
                            week.push("");  // Empty cells for days after the last of the month
                        } else {
                            week.push(date);  // Actual day number
                            date++;
                        }
                    }
                    this.calendar.push(week);  // Add the week to the calendar
                }
            },
            toggleDay(day) {
            if (this.selectedDays?.includes(day)) {
                this.selectedDays = this.selectedDays?.filter(d => d !== day); // Remove day
            } else {
                
if(this.selectedDays){
    this.selectedDays.push(day)
}else{
    this.selectedDays = [day];
}
             
                
            }

            
            @this.storeAttendance(day);
        },

            
            isAttend(day){
                return this.selectedDays?.includes(day);

            }
        };
    }
</script>
