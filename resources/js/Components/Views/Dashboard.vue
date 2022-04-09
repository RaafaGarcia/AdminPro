<template>
  <app-layout> 
     <div>
    <!-- strat wrapper -->
    <div class=" flex flex-row flex-wrap">
      <!-- strat content -->
      <div class="bg-gray-100 flex-1  py-2 px-2 md:p-5 ">
        <!-- General Report -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
          <!-- card -->
          <div class="report-card">
            <div class="card">
              <div class="card-body flex flex-col">
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                  <div class="h6 text-indigo-700 fad fa-shopping-cart"></div>
                  <span
                    class="rounded-full text-white badge bg-green-400 text-xs"
                  >
                    12%
                    <i class="fal fa-chevron-up ml-1"></i>
                  </span>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                  <h1 class="h5 num-4"></h1>
                  <p>items sales</p>
                </div>
                <!-- end bottom -->
              </div>
            </div>
            <div
              class="
                footer
                bg-white
                p-1
                mx-4
                border border-t-0
                rounded rounded-t-none
              "
            ></div>
          </div>
          <!-- end card -->

          <!-- card -->
          <div class="report-card">
            <div class="card">
              <div class="card-body flex flex-col">
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                  <div class="h6 text-red-700 fad fa-store"></div>
                  <span
                    class="rounded-full text-white badge bg-red-400 text-xs"
                  >
                    6%
                    <i class="fal fa-chevron-down ml-1"></i>
                  </span>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                  <h1 class="h5 num-4"></h1>
                  <p>new orders</p>
                </div>
                <!-- end bottom -->
              </div>
            </div>
            <div
              class="
                footer
                bg-white
                p-1
                mx-4
                border border-t-0
                rounded rounded-t-none
              "
            ></div>
          </div>
          <!-- end card -->

          <!-- card -->
          <div class="report-card">
            <div class="card">
              <div class="card-body flex flex-col">
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                  <div class="h6 text-yellow-600 fad fa-sitemap"></div>
                  <span
                    class="rounded-full text-white badge bg-green-400 text-xs"
                  >
                    72%
                    <i class="fal fa-chevron-up ml-1"></i>
                  </span>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                  <h1 class="h5 num-4"></h1>
                  <p>total Products</p>
                </div>
                <!-- end bottom -->
              </div>
            </div>
            <div
              class="
                footer
                bg-white
                p-1
                mx-4
                border border-t-0
                rounded rounded-t-none
              "
            ></div>
          </div>
          <!-- end card -->

          <!-- card -->
          <div class="report-card">
            <div class="card">
              <div class="card-body flex flex-col">
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                  <div class="h6 text-green-700 fad fa-users"></div>
                  <span
                    class="rounded-full text-white badge bg-green-400 text-xs"
                  >
                    150%
                    <i class="fal fa-chevron-up ml-1"></i>
                  </span>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                  <h1 class="h5 num-4"></h1>
                  <p>new Visitor</p>
                </div>
                <!-- end bottom -->
              </div>
            </div>
            <div
              class="
                footer
                bg-white
                p-1
                mx-4
                border border-t-0
                rounded rounded-t-none
              "
            ></div>
          </div>
          <!-- end card -->
        </div>
        <!-- End General Report -->

        <!-- strat Analytics -->
        <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">
          <!-- update section -->
          <div class="card bg-green-500 border-green-600 shadow-md text-white">
            <div class="card-body flex flex-row">
              <!-- image -->
              <div
                class="img-wrapper w-40 h-40 flex justify-center items-center"
              >
                <img src="/happy.svg" alt="img title" />
              </div>
              <!-- end image -->

              <!-- info -->
              <div class="py-2 ml-10">
                <h1 class="h6">Good Job!</h1>
                <p class="text-white text-xs">
                  You've finished all of your tasks for this week.
                </p>

                <ul class="mt-4">
                  <li class="text-sm font-light">
                    <i class="fad fa-check-double mr-2 mb-2"></i> Finish
                    Dashboard Design
                  </li>
                  <li class="text-sm font-light">
                    <i class="fad fa-check-double mr-2 mb-2"></i> Fix Issue #74
                  </li>
                  <li class="text-sm font-light">
                    <i class="fad fa-check-double mr-2"></i> Publish version
                    1.0.6
                  </li>
                </ul>
              </div>
              <!-- end info -->
            </div>
          </div>
          <!-- end update section -->

          <!-- carts -->
          <div class="flex flex-col">
            <!-- alert -->
            <div class="alert alert-success mb-6">
              Hi! Wait A Minute . . . . . . 
             
              
            </div>
            <!-- end alert -->

            <!-- charts -->
            <div class="grid grid-cols-2 gap-6 h-full">
              <div class="card">
                <div class="py-3 px-4 flex flex-row justify-between">
                  <h1 class="h6">
                    <span class="num-4"></span>k
                    <p>page view</p>
                  </h1>

                  <div
                    class="
                      bg-teal-200
                      text-teal-700
                      border-teal-300 border
                      w-10
                      h-10
                      rounded-full
                      flex
                      justify-center
                      items-center
                    "
                  >
                    <i class="fad fa-eye"></i>
                  </div>
                </div>
                <div id="analytics_1"></div>
              </div>

              <div class="card">
                <div class="py-3 px-4 flex flex-row justify-between">
                  <h1 class="h6">
                    <span class="num-2"></span>k
                    <p>Unique Users</p>
                  </h1>

                  <div
                    class="
                      bg-indigo-200
                      text-indigo-700
                      border-indigo-300 border
                      w-10
                      h-10
                      rounded-full
                      flex
                      justify-center
                      items-center
                    "
                  >
                    <i class="fad fa-users-crown"></i>
                  </div>
                </div>
                <div id="analytics_2"></div>
              </div>
            </div>
            <!-- charts    -->
          </div>
          <!-- end charts -->
        </div>
        <!-- end Analytics -->

        <!-- Sales Overview -->
        <div class="card mt-6">
          <!-- header -->
          <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Sales Overview</h1>

            <div class="flex flex-row justify-center items-center">
              <a href="">
                <i class="fad fa-chevron-double-down mr-6"></i>
              </a>

              <a href="">
                <i class="fad fa-ellipsis-v"></i>
              </a>
            </div>
          </div>
          <!-- end header -->

          <!-- body -->
          <div class="card-body grid grid-cols-1 gap-6 md:grid-cols-2">
            <div class="p-8">
              <h1 class="h2">5,337</h1>
              <p class="text-black font-medium">Sales this month</p>

              <div class="mt-20 mb-2 flex items-center">
                <div class="py-1 px-3 rounded bg-green-200 text-green-900 mr-3">
                  <i class="fa fa-caret-up"></i>
                </div>
                <p class="text-black">
                  <span class="num-2 text-green-400"></span
                  ><span class="text-green-400">% more sales</span> in
                  comparison to last month.
                </p>
              </div>

              <div class="flex items-center">
                <div class="py-1 px-3 rounded bg-red-200 text-red-900 mr-3">
                  <i class="fa fa-caret-down"></i>
                </div>
                <p class="text-black">
                  <span class="num-2 text-red-400"></span
                  ><span class="text-red-400">% revenue per sale</span> in
                  comparison to last month.
                </p>
              </div>

              <a href="#" class="btn-shadow mt-6">view details</a>
            </div>

            <div class="">
              <div id="sealsOverview"></div>
            </div>
          </div>
          <!-- end body -->
        </div>
        <!-- end Sales Overview -->

        <!-- start numbers -->
        <div class="grid grid-cols-2 gap-6 md:grid-cols-5">
          <!-- card -->
          <div class="card mt-6">
            <div class="card-body flex items-center overflow-auto">
              <div class="px-3 py-2 rounded bg-indigo-600 text-white mr-3">
                <i class="fad fa-wallet"></i>
              </div>

              <div class="flex flex-col">
                <h1 class="font-semibold"><span class="num-2"></span> Sales</h1>
                <p class="text-xs"><span class="num-2"></span> payments</p>
              </div>
            </div>
          </div>
          <!-- end card -->

          <!-- card -->
          <div class="card mt-6">
            <div class="card-body flex items-center overflow-auto">
              <div class="px-3 py-2 rounded bg-green-600 text-white mr-3">
                <i class="fad fa-shopping-cart"></i>
              </div>

              <div class="flex flex-col">
                <h1 class="font-semibold ">
                  <span class="num-2"></span> Orders
                </h1>
                <p class="text-xs"><span class="num-2"></span> items</p>
              </div>
            </div>
          </div>
          <!-- end card -->

          <!-- card -->
          <div class="card mt-6 ">
            <div class="card-body flex items-center overflow-auto">
              <div class="px-3 py-2 rounded bg-yellow-600 text-white mr-3">
                <i class="fad fa-blog"></i>
              </div>

              <div class="flex flex-col">
                <h1 class="font-semibold"><span class="num-2"></span> posts</h1>
                <p class="text-xs"><span class="num-2"></span> active</p>
              </div>
            </div>
          </div>
          <!-- end card -->

          <!-- card -->
          <div class="card mt-6 ">
            <div class="card-body flex items-center overflow-auto">
              <div class="px-3 py-2 rounded bg-red-600 text-white mr-3">
                <i class="fad fa-comments"></i>
              </div>

              <div class="flex flex-col">
                <h1 class="font-semibold ">
                  <span class="num-2"></span> comments
                </h1>
                <p class="text-xs"><span class="num-2"></span> approved</p>
              </div>
            </div>
          </div>
          <!-- end card -->

          <!-- card -->
          <div class="card mt-6 ">
            <div class="card-body flex items-center overflow-auto">
              <div class="px-3 py-2 rounded bg-pink-600 text-white mr-3">
                <i class="fad fa-user"></i>
              </div>

              <div class="flex flex-col">
                <h1 class="font-semibold">
                  <span class="num-2"></span> memebrs
                </h1>
                <p class="text-xs"><span class="num-2"></span> online</p>
              </div>
            </div>
          </div>
          <!-- end card -->
        </div>
        <!-- end nmbers -->

        <!-- start quick Info -->
        <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-3">
          <!-- Browser Stats -->
          <div class="card">
            <div class="card-header">Browser Stats</div>

            <!-- brawser -->
            <div
              class="
                p-6
                flex flex-row
                justify-between
                items-center
                text-gray-600
                border-b
              "
            >
              <div class="flex items-center">
                <i class="fab fa-chrome mr-4"></i>
                <h1>google chrome</h1>
              </div>
              <div><span class="num-2"></span>%</div>
            </div>
            <!-- end brawser -->

            <!-- brawser -->
            <div
              class="
                p-6
                flex flex-row
                justify-between
                items-center
                text-gray-600
                border-b
              "
            >
              <div class="flex items-center">
                <i class="fab fa-firefox mr-4"></i>
                <h1>firefox</h1>
              </div>
              <div><span class="num-2"></span>%</div>
            </div>
            <!-- end brawser -->

            <!-- brawser -->
            <div
              class="
                p-6
                flex flex-row
                justify-between
                items-center
                text-gray-600
                border-b
              "
            >
              <div class="flex items-center">
                <i class="fab fa-internet-explorer mr-4"></i>
                <h1>internet explorer</h1>
              </div>
              <div><span class="num-2"></span>%</div>
            </div>
            <!-- end brawser -->

            <!-- brawser -->
            <div
              class="
                p-6
                flex flex-row
                justify-between
                items-center
                text-gray-600
                border-b-0
              "
            >
              <div class="flex items-center">
                <i class="fab fa-safari mr-4"></i>
                <h1>safari</h1>
              </div>
              <div><span class="num-2"></span>%</div>
            </div>
            <!-- end brawser -->
          </div>
          <!-- end Browser Stats -->

          <!-- Start Recent Sales -->
          <div class="card col-span-1 md:col-span-2">
            <div class="card-header">Recent Sales</div>

            <table class="table-auto w-full text-left overflow-x-auto block  md:inline-table ">
              <thead>
                <tr>
                  <th class="px-4 py-2 border-r"></th>
                  <th class="px-4 py-2 border-r">product</th>
                  <th class="px-4 py-2 border-r">price</th>
                  <th class="px-4 py-2">date</th>
                </tr>
              </thead>
              <tbody class="text-gray-600">
                <tr>
                  <td
                    class="
                      border border-l-0
                      px-4
                      py-2
                      text-center text-green-500
                    "
                  >
                    <i class="fad fa-circle"></i>
                  </td>
                  <td class="border border-l-0 px-4 py-2">
                    Lightning to USB-C Adapter Lightning.
                  </td>
                  <td class="border border-l-0 px-4 py-2">
                    $<span class="num-2"></span>
                  </td>
                  <td class="border border-l-0 border-r-0 px-4 py-2">
                    <span class="num-2"></span> minutes ago
                  </td>
                </tr>
                <tr>
                  <td
                    class="
                      border border-l-0
                      px-4
                      py-2
                      text-center text-yellow-500
                    "
                  >
                    <i class="fad fa-circle"></i>
                  </td>
                  <td class="border border-l-0 px-4 py-2">Apple iPhone 8.</td>
                  <td class="border border-l-0 px-4 py-2">
                    $<span class="num-2"></span>
                  </td>
                  <td class="border border-l-0 border-r-0 px-4 py-2">
                    <span class="num-2"></span> minutes ago
                  </td>
                </tr>
                <tr>
                  <td
                    class="
                      border border-l-0
                      px-4
                      py-2
                      text-center text-green-500
                    "
                  >
                    <i class="fad fa-circle"></i>
                  </td>
                  <td class="border border-l-0 px-4 py-2">
                    Apple MacBook Pro.
                  </td>
                  <td class="border border-l-0 px-4 py-2">
                    $<span class="num-2"></span>
                  </td>
                  <td class="border border-l-0 border-r-0 px-4 py-2">
                    <span class="num-2"></span> minutes ago
                  </td>
                </tr>
                <tr>
                  <td
                    class="border border-l-0 px-4 py-2 text-center text-red-500"
                  >
                    <i class="fad fa-circle"></i>
                  </td>
                  <td class="border border-l-0 px-4 py-2">
                    Samsung Galaxy S9.
                  </td>
                  <td class="border border-l-0 px-4 py-2">
                    $<span class="num-2"></span>
                  </td>
                  <td class="border border-l-0 border-r-0 px-4 py-2">
                    <span class="num-2"></span> minutes ago
                  </td>
                </tr>
                <tr>
                  <td
                    class="
                      border border-l-0
                      px-4
                      py-2
                      text-center text-yellow-500
                    "
                  >
                    <i class="fad fa-circle"></i>
                  </td>
                  <td class="border border-l-0 px-4 py-2">
                    Samsung Galaxy S8 256GB.
                  </td>
                  <td class="border border-l-0 px-4 py-2">
                    $<span class="num-2"></span>
                  </td>
                  <td class="border border-l-0 border-r-0 px-4 py-2">
                    <span class="num-2"></span> minutes ago
                  </td>
                </tr>
                <tr>
                  <td
                    class="
                      border border-l-0 border-b-0
                      px-4
                      py-2
                      text-center text-green-500
                    "
                  >
                    <i class="fad fa-circle"></i>
                  </td>
                  <td class="border border-l-0 border-b-0 px-4 py-2">
                    apple watch.
                  </td>
                  <td class="border border-l-0 border-b-0 px-4 py-2">
                    $<span class="num-2"></span>
                  </td>
                  <td class="border border-l-0 border-b-0 border-r-0 px-4 py-2">
                    <span class="num-2"></span> minutes ago
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- End Recent Sales -->
        </div>
        <!-- end quick Info -->
      </div>
      <!-- end content -->
    </div>
    <!-- end wrapper -->
  </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Components/Layouts/AppLayout";
// import Landing from "@/components/Landing"
import ApexCharts from 'apexcharts'

export default {
  components: {
    AppLayout,
    // Landing
    
  },
  data(){
     return{
  user: this.$store.state.auth.user,
     }
  },
  methods: {
    numArr(length, max) {
      return Array.from({ length: length }, () =>
        Math.floor(Math.random() * max)
      );
    },
   
  },
  mounted() {
    var options = function (type, height, numbers, color) {
      return {
        chart: {
          height: height,
          width: "100%",
          type: type,
          sparkline: {
            enabled: true,
          },
          toolbar: {
            show: false,
          },
        },
        grid: {
          show: false,
          padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0,
          },
        },
        dataLabels: {
          enabled: false,
        },
        legend: {
          show: false,
        },
        series: [
          {
            name: "serie1",
            data: numbers,
          },
        ],
        fill: {
          colors: [color],
        },
        stroke: {
          colors: [color],
          width: 3,
        },
        yaxis: {
          show: false,
        },
        xaxis: {
          show: false,
          labels: {
            show: false,
          },
          axisBorder: {
            show: false,
          },
          tooltip: {
            enabled: false,
          },
        },
      };
    };

    // var chart = new ApexCharts(document.querySelector("#analytics_1"), options);

    // chart.render();

    var analytics_1 = document.getElementsByClassName("analytics_1");

    if (analytics_1 != null && typeof analytics_1 != "undefined") {
      var chart = new ApexCharts(
        document.querySelector("#analytics_1"),
        options("area", "51px", this.numArr(10, 99), "#4fd1c5")
      );
      var chart_1 = new ApexCharts(
        document.querySelector("#analytics_2"),
        options("area", "51px", this.numArr(10, 99), "#4c51bf")
      );
      chart.render();
      chart_1.render();
    }

    var sealsOptions = {
      chart: {
        height: 350,
        type: "line",
        stacked: false,
      },
      dataLabels: {
        enabled: false,
      },
      colors: ["#99C2A2", "#C5EDAC", "#66C7F4"],
      series: [
        {
          name: "Column A",
          type: "column",
          data: [21.1, 23, 33.1, 34, 44.1, 44.9, 56.5, 58.5],
        },
        {
          name: "Column B",
          type: "column",
          data: [10, 19, 27, 26, 34, 35, 40, 38],
        },
        {
          name: "Line C",
          type: "column",
          data: [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6],
        },
      ],
      stroke: {
        width: [4, 4, 4],
      },
      plotOptions: {
        bar: {
          columnWidth: "20%",
        },
      },
      xaxis: {
        categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016],
      },
      yaxis: [
        {
          seriesName: "Column A",
          axisTicks: {
            show: true,
          },
          axisBorder: {
            show: true,
          },
          title: {
            text: "Columns",
          },
        },
        {
          seriesName: "Column A",
          show: false,
        },
        {
          opposite: true,
          seriesName: "Line C",
          axisTicks: {
            show: true,
          },
          axisBorder: {
            show: true,
          },
          title: {
            text: "Line",
          },
        },
      ],
      tooltip: {
        shared: false,
        intersect: true,
        x: {
          show: false,
        },
      },
      legend: {
        horizontalAlign: "left",
        offsetX: 40,
      },
    };

    var sealsOverview = document.getElementById("sealsOverview");
    var sealsOverviewChart = new ApexCharts(
      sealsOverview,
      options("bar", "100%", this.numArr(20, 999), "#30aba0")
    );
    sealsOverviewChart.render();

    var num = function (from, to) {
      return Math.floor(Math.random() * to) + from;
    };

    // return 2 digit
    var el_2 = document.getElementsByClassName("num-2");
    var display_2 = function () {
      for (let i = 0; i < el_2.length; i++) {
        const e = el_2[i];

        e.innerText = num(1, 99);
      }
    };

    if (el_2.length > 0) {
      display_2();
    }
    // end 2 digit

    // return 3 digit
    var el_3 = document.getElementsByClassName("num-3");
    var display_3 = function () {
      for (let i = 0; i < el_3.length; i++) {
        const e = el_3[i];

        e.innerText = num(99, 999);
      }
    };

    if (el_3.length > 0) {
      display_3();
    }
    // end 3 digit

    // return 4 digit
    var el_4 = document.getElementsByClassName("num-4");
    var display_4 = function () {
      for (let i = 0; i < el_4.length; i++) {
        const e = el_4[i];

        e.innerText = num(999, 9999);
      }
    };

    if (el_4.length > 0) {
      display_4();
    }
    // end 4 digits
  },
};
</script>