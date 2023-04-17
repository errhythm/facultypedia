{{-- redirect if already logged in --}}
@if (Auth::check())
    {{-- redirect to your profile --}}
    <script>
        window.location = "/profile";
    </script>
@endif

<x-layout :header=false :footer=false>
    <section class="bg-base-100">
        <div class="grid grid-cols-1 lg:grid-cols-2 min-h-screen">
            <div class="flex items-center justify-center px-4 py-10 bg-base-100 sm:px-6 lg:px-8 sm:py-16 lg:py-24">
                <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
                    <h2 class="text-3xl font-bold leading-tight text-base-content sm:text-4xl">
                        Sign in to FacultyPedia
                    </h2>
                    <p class="mt-2 text-base text-base-content/60">
                        Don't have an account?
                        <a href="/register" title=""
                            class="font-medium text-info/80 transition-all duration-200 hover:text-info hover:underline focus:text-info">
                            Create a free account
                        </a>
                    </p>
                    <form method="POST" action="/loginuser" class="mt-8">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <label for="email" class="text-base font-medium text-base-content/90">
                                    Email address
                                </label>
                                <div class="mt-2.5 relative text-base-content/40 focus-within:text-base-content/60">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </div>

                                    <input type="email" name="email" id="email"
                                        placeholder="Enter email to get started"
                                        class="block w-full py-4 pl-10 pr-4 text-base-content placeholder-base-2000 transition-all duration-200 border border-base-content/20 rounded-md bg-base-200 focus:outline-none focus:border-info-content/80 focus:bg-base-100 caret-info-content/80" />
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="password" class="text-base font-medium text-base-content/90">
                                        Password
                                    </label>

                                    <a href="\recover" title=""
                                        class="text-sm font-medium text-info/80 transition-all duration-200 hover:text-info focus:text-info hover:underline">
                                        Forgot password?
                                    </a>
                                </div>
                                <div class="mt-2.5 relative text-base-content/40 focus-within:text-base-content/60">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                                        </svg>
                                    </div>

                                    <input type="password" name="password" id="password"
                                        placeholder="Enter your password"
                                        class="block w-full py-4 pl-10 pr-4 text-base-content placeholder-base-2000 transition-all duration-200 border border-base-content/20 rounded-md bg-base-200 focus:outline-none focus:border-info-content/80 focus:bg-base-100 caret-info-content/80" />
                                </div>
                            </div>

                            <div>
                                <button type="submit" value="login"
                                    class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-base-100 transition-all duration-200 border border-transparent rounded-md bg-gradient-to-r from-success-content to-info-content/80 focus:outline-none hover:opacity-80 focus:opacity-80">
                                    Log in
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="flex items-center justify-center px-4 py-10 sm:py-16 lg:py-24 bg-base-200 sm:px-6 lg:px-8">
                <div>
                    <svg class="w-full mx-auto" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3710 3710">
                        <defs>
                            <linearGradient id="linear-gradient" x1="578.37" y1="2442.59" x2="2224.9"
                                y2="2442.59" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#ff9085" />
                                <stop offset="1" stop-color="#fb6fbb" />
                            </linearGradient>
                            <linearGradient id="linear-gradient-2" x1="499.79" y1="1438.54" x2="634.01"
                                y2="1133.25" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#e38ddd" />
                                <stop offset="1" stop-color="#9571f6" />
                            </linearGradient>
                            <linearGradient id="linear-gradient-3" x1="731.97" y1="1440.4" x2="2287.64"
                                y2="1782.54" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#f4f7fa" />
                                <stop offset="1" stop-color="#d8dee8" />
                            </linearGradient>
                            <linearGradient id="linear-gradient-4" x1="688.15" y1="1569.67" x2="1850.28"
                                y2="1569.67" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#aa80f9" />
                                <stop offset="1" stop-color="#6165d7" />
                            </linearGradient>
                            <linearGradient id="linear-gradient-5" x1="560.23" y1="921.09" x2="324.92"
                                y2="1713.7" xlink:href="#linear-gradient" />
                            <linearGradient id="linear-gradient-6" x1="803.08" y1="1117.09" x2="2358.74"
                                y2="1459.23" xlink:href="#linear-gradient-3" />
                            <linearGradient id="linear-gradient-7" x1="688.15" y1="1239.13" x2="1850.28"
                                y2="1239.13" xlink:href="#linear-gradient" />
                            <linearGradient id="linear-gradient-8" x1="893.79" y1="1431.17" x2="922.33"
                                y2="1654.23" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#ffc444" />
                                <stop offset="0.1" stop-color="#febc46" />
                                <stop offset="1" stop-color="#f36f56" />
                            </linearGradient>
                            <linearGradient id="linear-gradient-9" x1="-2245.59" y1="1064.35" x2="-2420.03"
                                y2="1546.98" gradientTransform="translate(3320.83 415.93) rotate(19.76)"
                                gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#444b8c" />
                                <stop offset="1" stop-color="#26264f" />
                            </linearGradient>
                            <linearGradient id="linear-gradient-10" x1="1012" y1="2928.34" x2="1004.64"
                                y2="3073.72" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#893976" />
                                <stop offset="1" stop-color="#311944" />
                            </linearGradient>
                            <linearGradient id="linear-gradient-11" x1="1717.16" y1="1480.11" x2="1755.92"
                                y2="1783.02" gradientTransform="matrix(-1, 0, 0, 1, 2378.66, 0)"
                                gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#ffc444" />
                                <stop offset="1" stop-color="#f36f56" />
                            </linearGradient>
                            <linearGradient id="linear-gradient-12" x1="1920.2" y1="1460.13" x2="1958.86"
                                y2="1762.26" gradientTransform="matrix(-1, 0, 0, 1, 2378.66, 0)"
                                xlink:href="#linear-gradient-8" />
                            <linearGradient id="linear-gradient-13" x1="655.47" y1="960.95" x2="659.36"
                                y2="1145.81" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#311944" />
                                <stop offset="1" stop-color="#a03976" />
                            </linearGradient>
                            <linearGradient id="linear-gradient-14" x1="3839.31" y1="-824.33" x2="3631.62"
                                y2="-566.9" gradientTransform="matrix(-0.78, 0.63, 0.63, 0.78, 3900.75, -813.59)"
                                xlink:href="#linear-gradient-13" />
                            <linearGradient id="linear-gradient-15" x1="667.39" y1="1707.63" x2="1097.63"
                                y2="1707.63" xlink:href="#linear-gradient-10" />
                            <linearGradient id="linear-gradient-16" x1="667.39" y1="1708.63" x2="1097.63"
                                y2="1708.63" xlink:href="#linear-gradient-10" />
                            <linearGradient id="linear-gradient-17" x1="789.22" y1="1875.05" x2="706.42"
                                y2="1771.99" xlink:href="#linear-gradient-4" />
                            <linearGradient id="linear-gradient-18" x1="738.38" y1="1850.57" x2="624.29"
                                y2="1707.03" gradientTransform="matrix(1, 0, 0, 1, 0, 0)"
                                xlink:href="#linear-gradient-11" />
                            <linearGradient id="linear-gradient-19" x1="492.75" y1="1702.82" x2="397.95"
                                y2="1900" xlink:href="#linear-gradient-10" />
                            <linearGradient id="linear-gradient-20" x1="1009.95" y1="3038.21" x2="1133.63"
                                y2="2407.12" xlink:href="#linear-gradient" />
                            <linearGradient id="linear-gradient-21" x1="1359.9" y1="2605.57" x2="1247.54"
                                y2="2671.28" xlink:href="#linear-gradient" />
                            <linearGradient id="linear-gradient-22" x1="1507.29" y1="1440.43" x2="1551.23"
                                y2="1216.24" gradientTransform="matrix(-1, 0, 0, 1, 2378.66, 0)"
                                xlink:href="#linear-gradient-13" />
                            <linearGradient id="linear-gradient-23" x1="6749.8" y1="3389.15" x2="6793.74"
                                y2="3164.93" gradientTransform="translate(-6464.5 -1279.61) rotate(-5.08)"
                                xlink:href="#linear-gradient-13" />
                            <linearGradient id="linear-gradient-24" x1="1321.17" y1="406.24" x2="1206.33"
                                y2="114.57" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#311944" />
                                <stop offset="1" stop-color="#6b3976" />
                            </linearGradient>
                            <linearGradient id="linear-gradient-25" x1="-2357.64" y1="1707.14" x2="-2321.55"
                                y2="1707.14" gradientTransform="matrix(-0.91, 0.41, 0.41, 0.91, -1263.87, 809.13)"
                                xlink:href="#linear-gradient-2" />
                            <linearGradient id="linear-gradient-26" x1="-1935.09" y1="1370.22" x2="-1928.78"
                                y2="1452.34" gradientTransform="matrix(-0.97, 0.23, 0.23, 0.97, -625.14, 411.57)"
                                xlink:href="#linear-gradient-11" />
                            <linearGradient id="linear-gradient-27" x1="-1222.35" y1="1410.89" x2="-1197.31"
                                y2="1263.42" gradientTransform="matrix(-1, -0.08, -0.08, 1, 464.46, 21.2)"
                                xlink:href="#linear-gradient-9" />
                            <linearGradient id="linear-gradient-28" x1="-2434.66" y1="2141.47" x2="-2359.22"
                                y2="2141.47" gradientTransform="matrix(-0.77, 0.64, 0.64, 0.77, -1980.47, 1504.67)"
                                xlink:href="#linear-gradient-2" />
                            <linearGradient id="linear-gradient-29" x1="-1181.2" y1="1298.05" x2="-1213.9"
                                y2="1449.27" gradientTransform="matrix(-1, 0.08, 0.08, 1, -102.99, 192.45)"
                                xlink:href="#linear-gradient-11" />
                            <linearGradient id="linear-gradient-30" x1="-2228.47" y1="862.32" x2="-1949.52"
                                y2="1083.03" gradientTransform="matrix(-0.97, 0.23, 0.23, 0.97, -625.14, 411.57)"
                                xlink:href="#linear-gradient-9" />
                            <linearGradient id="linear-gradient-31" x1="-1322.28" y1="1018.72" x2="-1024.54"
                                y2="1088.28" gradientTransform="matrix(-1, -0.08, -0.08, 1, 464.46, 21.2)"
                                xlink:href="#linear-gradient-9" />
                            <linearGradient id="linear-gradient-32" x1="-933.33" y1="67.57" x2="-902.96"
                                y2="1100.05" gradientTransform="matrix(-1, -0.08, -0.08, 1, 387.56, 15.05)"
                                xlink:href="#linear-gradient" />
                            <linearGradient id="linear-gradient-33" x1="-1134.26" y1="560.73" x2="-1008.94"
                                y2="560.73" gradientTransform="matrix(-1, -0.08, -0.08, 1, 464.46, 21.2)"
                                xlink:href="#linear-gradient" />
                            <linearGradient id="linear-gradient-34" x1="-954.63" y1="645.12" x2="-518.71"
                                y2="645.12" gradientTransform="matrix(-1, -0.08, -0.08, 1, 464.46, 21.2)"
                                xlink:href="#linear-gradient" />
                            <linearGradient id="linear-gradient-35" x1="-1171.36" y1="-137.75" x2="-1206.63"
                                y2="163" gradientTransform="matrix(-1, 0.03, 0.03, 1, -3.77, 283.6)"
                                xlink:href="#linear-gradient-11" />
                            <linearGradient id="linear-gradient-36" x1="-1000.47" y1="521.33" x2="-1055.13"
                                y2="973.78" gradientTransform="matrix(-1, -0.08, -0.08, 1, 464.46, 21.2)"
                                xlink:href="#linear-gradient-11" />
                            <linearGradient id="linear-gradient-37" x1="1607.08" y1="2289.46" x2="1730.76"
                                y2="1658.37" xlink:href="#linear-gradient-2" />
                            <linearGradient id="linear-gradient-38" x1="1957.03" y1="1856.81" x2="1844.67"
                                y2="1922.53" xlink:href="#linear-gradient-2" />
                            <linearGradient id="linear-gradient-39" x1="-2040.1" y1="206.88" x2="-2018.82"
                                y2="1088.03" gradientTransform="translate(3270.01)"
                                xlink:href="#linear-gradient-11" />
                            <linearGradient id="linear-gradient-40" x1="5941.24" y1="3410.79" x2="5886.58"
                                y2="3863.25" gradientTransform="translate(-5036.6 -417.71) rotate(4.57)"
                                xlink:href="#linear-gradient-11" />
                            <linearGradient id="linear-gradient-41" x1="-668.34" y1="59.79" x2="-637.97"
                                y2="1092.26" gradientTransform="matrix(-1, -0.08, -0.08, 1, 387.56, 15.05)"
                                xlink:href="#linear-gradient" />
                            <linearGradient id="linear-gradient-42" x1="1439.79" y1="619.89" x2="1372.52"
                                y2="1176.73" gradientTransform="matrix(1, 0, 0, 1, 0, 0)"
                                xlink:href="#linear-gradient-11" />
                            <linearGradient id="linear-gradient-43" x1="1699.44" y1="618.01" x2="1840.19"
                                y2="618.01" xlink:href="#linear-gradient-13" />
                            <linearGradient id="linear-gradient-44" x1="-1212.34" y1="274.25" x2="-1670.93"
                                y2="608.69" gradientTransform="matrix(-1, -0.07, -0.07, 1, 1054.29, 38.25)"
                                xlink:href="#linear-gradient-9" />
                            <linearGradient id="linear-gradient-45" x1="-1496.84" y1="372.43" x2="-1752.9"
                                y2="559.18" gradientTransform="matrix(-1, -0.07, -0.07, 1, 1054.29, 38.25)"
                                xlink:href="#linear-gradient-9" />
                            <linearGradient id="linear-gradient-46" x1="1871.33" y1="1589.73" x2="1894.14"
                                y2="2000.2" gradientTransform="translate(487.57)"
                                xlink:href="#linear-gradient-9" />
                            <linearGradient id="linear-gradient-47" x1="2228.26" y1="1566.8" x2="2251.07"
                                y2="1977.27" gradientTransform="translate(487.57)"
                                xlink:href="#linear-gradient-9" />
                            <linearGradient id="linear-gradient-48" x1="-1277.24" y1="1286.76" x2="-1048.15"
                                y2="1286.76" gradientTransform="matrix(-1, 0, 0, 1, 1190.46, 0)"
                                xlink:href="#linear-gradient-9" />
                            <linearGradient id="linear-gradient-49" x1="-1527.94" y1="1279.77" x2="-1194.74"
                                y2="1279.77" gradientTransform="matrix(-1, 0, 0, 1, 1190.46, 0)"
                                xlink:href="#linear-gradient-9" />
                            <linearGradient id="linear-gradient-50" x1="2253.92" y1="480.09" x2="2205.79"
                                y2="2020.39" xlink:href="#linear-gradient-2" />
                            <linearGradient id="linear-gradient-51" x1="2202.56" y1="831.27" x2="2696.56"
                                y2="831.27" xlink:href="#linear-gradient-2" />
                            <linearGradient id="linear-gradient-52" x1="5177.55" y1="-3339.65" x2="5037.07"
                                y2="-3696.46" gradientTransform="translate(-3186.82 2836.37) rotate(10.21)"
                                xlink:href="#linear-gradient-24" />
                            <linearGradient id="linear-gradient-53" x1="7910.64" y1="-1100.74" x2="7870.31"
                                y2="-756.88" gradientTransform="translate(-5493.1 298.51) rotate(6.33)"
                                xlink:href="#linear-gradient-13" />
                            <linearGradient id="linear-gradient-54" x1="3570.48" y1="-5878.69" x2="3514.39"
                                y2="-5738.48" gradientTransform="translate(-3870.72 2470.22) rotate(38.7)"
                                xlink:href="#linear-gradient-13" />
                            <linearGradient id="linear-gradient-55" x1="-1263.52" y1="437.57" x2="-1508.61"
                                y2="616.31" gradientTransform="matrix(-1, 0, 0, 1, 1190.46, 0)"
                                xlink:href="#linear-gradient-9" />
                            <linearGradient id="linear-gradient-56" x1="-987.85" y1="427.11" x2="-1122.82"
                                y2="525.54" gradientTransform="matrix(-1, 0, 0, 1, 1190.46, 0)"
                                xlink:href="#linear-gradient-9" />
                            <linearGradient id="linear-gradient-57" x1="2345.23" y1="534.24" x2="2319.67"
                                y2="1351.91" gradientTransform="matrix(1, 0, 0, 1, 0, 0)"
                                xlink:href="#linear-gradient-11" />
                            <linearGradient id="linear-gradient-58" x1="2326.42" y1="541.25" x2="2300.9"
                                y2="1358.04" gradientTransform="matrix(1, 0, 0, 1, 0, 0)"
                                xlink:href="#linear-gradient-11" />
                            <linearGradient id="linear-gradient-59" x1="2859.73" y1="1747.14" x2="2785.2"
                                y2="2318.08" gradientTransform="matrix(1, 0, 0, 1, 0, 0)"
                                xlink:href="#linear-gradient-11" />
                            <linearGradient id="linear-gradient-60" x1="8586.2" y1="369.44" x2="8539.63"
                                y2="1859.72" gradientTransform="translate(-5939.5)"
                                xlink:href="#linear-gradient-2" />
                            <linearGradient id="linear-gradient-61" x1="-3134" y1="1088.31" x2="-2710.46"
                                y2="492.71" gradientTransform="matrix(-1, 0, 0, 1, -421.21, 0)"
                                xlink:href="#linear-gradient-13" />
                        </defs>
                        <g style="isolation:isolate">
                            <g id="Background">
                                <rect width="3710" height="3710" style="fill:none" />
                            </g>
                            <g id="Illustration">
                                <path d="M829.13,337.4" transform="translate(395.3 1351.12)" style="fill:#abc" />
                                <path
                                    d="M329,1068.17c1,60.14-56.11,234.33,517.49,292.11l11.25-140.74-121-36.44c-56.91-17.14-90.76-72.2-77.87-126.66"
                                    transform="translate(395.3 1351.12)" style="fill:#abc" />
                                <path d="M895.71,712.38a23.13,23.13,0,0,0,46.25,0"
                                    transform="translate(395.3 1351.12)" style="fill:#bfc8d6" />
                                <polygon
                                    points="578.37 2365.37 1343.43 2332.11 2224.9 2363 1355.31 2553.07 578.37 2365.37"
                                    style="fill:url(#linear-gradient)" />
                                <path
                                    d="M799.49,1751.48,179.78,1584.69c-62.41-16.8-110.9-78.63-110.9-138.6v-.66c0-60,48.49-100.2,110.9-89.19L844.44,1465Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-2)" />
                                <path
                                    d="M1830.66,1626.22,829.34,1738.05c-62.71,7-114.27-36.73-114.27-97.79v-41.41c0-61.06,51.56-114.65,114.27-119.65l1001.32-79.7C1786.35,1482,1776.13,1559.16,1830.66,1626.22Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-3)" />
                                <path
                                    d="M1839.38,1637.33,837.74,1750.9c-81.81,9.28-149.59-48-149.59-127.89v-.88c0-79.87,67.78-150.14,149.59-156.52l1001.64-78.13c6-.47,10.9,4.55,10.9,11.21s-4.88,12.46-10.9,13L837.74,1493.19c-65.81,5.36-120.15,62-120.15,126.12v.88c0,64.15,54.34,110.37,120.15,103.13l1001.64-110.15c6-.66,10.9,4.2,10.9,10.86S1845.4,1636.65,1839.38,1637.33Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-4)" />
                                <path
                                    d="M825.52,1465.68,179.78,1356.24c-62.41-11-110.9-92.82-110.9-182.86v-1c0-90,48.49-161.49,110.9-159.17l685,25.44Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-5)" />
                                <path
                                    d="M1830.66,1370l-945.2,71.29c-93.22,7-170.39-61.46-170.39-153.13V1226c0-91.67,77.17-168.09,170.39-170.63l945.2-25.77C1786.21,1153.18,1776.27,1268.92,1830.66,1370Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-6)" />
                                <path
                                    d="M1839.38,1387.48,837.74,1465.61c-81.81,6.38-149.59-85.91-149.59-205.84v-1.32c0-119.93,67.78-219.18,149.59-221.22l1001.64-24.89c6-.15,10.9,7.84,10.9,17.84s-4.88,18.25-10.9,18.43l-1001.64,30c-65.81,2-120.15,82-120.15,178.29v1.32c0,96.32,54.34,170.73,120.15,165.93l1001.64-73c6-.44,10.9,7.31,10.9,17.31S1845.4,1387,1839.38,1387.48Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-7)" />
                                <path
                                    d="M625.28,1375.44l-138-24.12c-32.23-88-29.81-168.79,0-265.38l138,9.81C597,1197.39,601.27,1289.46,625.28,1375.44Z"
                                    transform="translate(395.3 1351.12)"
                                    style="fill:#fff;opacity:0.5;mix-blend-mode:soft-light" />
                                <path d="M895.77,1185.05s139.11,146.7,111.86,239.88-245.39-64.59-245.39-64.59Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-8)" />
                                <path
                                    d="M836.12,1056.5c10.28-4.91,39-29.48,39.45-59.92.32-20.75-13.3-27.9-11.24-49.59,2.34-24.64,21-27,30.74-53.12,11.37-30.46,2.63-71.84-20.15-93.72-18.36-17.63-30.9-8.25-62-30.18-27.53-19.38-24.65-31.59-42.54-40.32-34.82-17-61.74,21.38-113.73,24.92-72.22,4.92-91.66-64.3-146.19-52.52-50.14,10.83-94.37,82.45-87.87,136.4,2.61,21.61,11.72,30.79,7.3,51.75-6.79,32.21-35.85,33-49.2,67.06-10.11,25.75-8.35,63.18,11.19,79.92,22.89,19.6,52.49-4.31,75.37,14.82,24.65,20.61,2.49,58.53,26.83,80.76,23,21,67.28,10.91,92,2.08,29.81-10.64,56.54-28.29,85-42.18C723.84,1066.88,784.16,1081.31,836.12,1056.5Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-9)" />
                                <polygon
                                    points="1004.24 3039.93 1347.65 2954.03 1364.82 3037.46 1050.45 3182.56 801.52 3121.07 651.36 2973.63 1004.24 3039.93"
                                    style="fill:url(#linear-gradient-10)" />
                                <path
                                    d="M937.19,1252c11.51-28-67.45-104.66-166.44-133-71.86-20.59-132.78-9.1-164.47-3.51-102.79,18.15-166.81,69.54-190.91,91.14,19.73,10.7,74.18,43.36,101.15,105.32,26.07,59.9,7.43,114.94-2.27,146.91-8.46,27.85-21.31,70.18-59.31,100.81-20.07,16.17-42.25,24.38-86.59,40.8-52.3,19.37-84.73,24.72-84.49,35.19.3,13.36,53.42,24.25,51.56,32.58-.13.62-.52.67-.58,1.12-.71,5.81,59,20.1,134.37,31.44,88.19,13.26,132.28,19.89,174.43,12.68,65.71-11.24,54.66-31.47,120.51-42.81,76.61-13.19,111.41,10.78,180.77-15.86,11.68-4.48,58.43-22.51,57.08-41.23-1.65-23.14-78.76-15.23-145.88-74.52a204.68,204.68,0,0,1-48.82-63.78c-6.4-13.29-33.25-82-6.31-156.79a46.38,46.38,0,0,1,4.54-9.35C838.12,1253.45,926.32,1278.4,937.19,1252Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-11)" />
                                <path
                                    d="M600.24,1371.71c16.59,31.93-41.47,124.48-122.33,132.38-43.82,4.28-87.06-17-113-49.17-40-49.64-27.62-111.45-23.29-133.08,25.55-127.66,175.64-180.8,189.4-185.45C567.57,1193,567,1228.68,559.28,1251c-6.36,18.43-23,38.11-56.27,77.47-29.63,35.06-44.32,47.55-39.92,58.23,5.22,12.68,33.59,13.63,51.56,10,33.3-6.78,51.54-33.56,56.31-41.08C580.1,1357.08,594.53,1360.73,600.24,1371.71Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-12)" />
                                <path
                                    d="M648.48,1036.28s-6.56,52.41-25.9,64.42-50.62,27.69-54.07,32,119.84,17.5,180.94-13.33h0c-20.13-4.2-25.61-5.74-25.61-5.74-5.46-1.55-15.66-4.42-25.88-10.24A88,88,0,0,1,669.52,1077l.22-29Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-13)" />
                                <path
                                    d="M637.65,1071.17s39.07,39.57,87.06,13.41c43-23.42-1.83-136.78-39.91-144.75-12.7-2.66-34.5,2.64-47.88,14.08-9.41,8-32,46.66-10.25,82.88-12-1.6-21.65,3-23.32,9-2.13,7.69,9.07,16.06,11.61,18A39,39,0,0,0,637.65,1071.17Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-14)" />
                                <path
                                    d="M667.39,1804.29a931.87,931.87,0,0,0,152.87-102c67.32-55.43,98.21-97.24,166.36-113.77,12.18-3,81.58-19.77,104,11,24.8,34.13-23.41,105.47-29.26,114.14C974.25,1842.55,752.52,1836.54,683,1832.36Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-15)" />
                                <path
                                    d="M1090.59,1599.53c-6.54-9-17.14-13.86-29.11-16.26,4,13.79,4.34,26.73-.64,38-13.6,30.91-53.89,21.39-82.19,57.66-27.8,35.62-8.56,70-33.13,84.65-28.16,16.84-63.07-22.5-93.23-3.68-20.51,12.8-14.13,37.07-38,50.3-16.52,9.14-32.71,4.82-51.53,2.45-21.57-2.71-51.11-3.29-88.2,4.46q4.22,7.61,8.44,15.21c69.55,4.18,291.28,10.19,378.36-118.69C1067.18,1705,1115.39,1633.66,1090.59,1599.53Z"
                                    transform="translate(395.3 1351.12)"
                                    style="opacity:0.30000000000000004;mix-blend-mode:multiply;fill:url(#linear-gradient-16)" />
                                <path
                                    d="M719,1823.55s12.51-9,30.65-2.86,47,11,46.92,19.92-28.87,14.42-48.8,10.77C728.7,1847.9,713.72,1831.33,719,1823.55Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-17)" />
                                <path d="M700.66,1808.4l33.4,10.74s5.43,9-1.9,14.77-32.76-6.39-32.76-6.39Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-18)" />
                                <path
                                    d="M236.43,1654.44c-9.86,57.41,114.06,119.53,142.42,133.74,57.82,29,166.6,69.89,328.06,54.26q3.23-19.32,6.44-38.64a763.57,763.57,0,0,1-89.61-37.23c-62.6-30.79-86.36-52.78-173.22-105.29-96.12-58.11-124.11-65.56-152.75-58.37C273.28,1609.06,241,1627.75,236.43,1654.44Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-19)" />
                                <polygon
                                    points="969.66 2771.13 1009.72 2542.7 1190.8 2612.11 1144.75 2841.06 969.66 2771.13"
                                    style="fill:url(#linear-gradient-20)" />
                                <polygon
                                    points="1291.07 2536.17 1190.8 2612.11 1144.75 2841.06 1218.56 2792.37 1291.07 2536.17"
                                    style="fill:url(#linear-gradient-21)" />
                                <path
                                    d="M843.66,1366.44s22.07-20.5,24.47-44.3-14.25-42.86-30.39-47.72-24.74,2.31-13.91,25.75S851.84,1338.83,843.66,1366.44Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-22)" />
                                <path
                                    d="M580.29,1422.12s-23.9-18.45-28.41-41.95,10.47-44,26.19-50.23,25,.1,16.2,24.41S569.66,1395.35,580.29,1422.12Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-23)" />
                                <path
                                    d="M1303.1,98.22c-47.66,18.09-64.09-13.84-139.93,12.24-57.14,19.64-40,41.39-28.1,50.93-5.59.46-15,7.17-30.13,32.61-29.78,50,79.88,95.3,79.88,95.3,25.09,44.22,82.92-78.81,82.92-78.81a500.36,500.36,0,0,0,77.13-33C1384.72,156.18,1350.75,80.13,1303.1,98.22Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-24)" />
                                <path
                                    d="M1564.42,1346.7s-18.3,6.8-18.29,16.38.08,19.7,12.95,43.14,14.28,34.3,23.76,34S1596.08,1369.47,1564.42,1346.7Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-25)" />
                                <path
                                    d="M1578,1321.35c-.7,1.73-13.49,19.77-20.8,30a11.51,11.51,0,0,0,.35,13.84h0a14.12,14.12,0,0,0,19.24,2.78c10.33-7.31,25.42-18.39,33.92-26.53Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-26)" />
                                <path
                                    d="M1241.11,936.48c-6.09-36.14,103.19-81.8,117.73-87.88,28.62-12,303.4-123.31,404.31,3.49,84.95,106.75-16,303.51-35.74,342.05-41.48,80.85-96.07,134.89-134.13,166.79l-34.87-36.39c4.91-48.2,11.17-88.14,16.36-117.27,7.67-43.09,14.59-81.93,28.7-131.72,22.34-78.85,36.2-91.56,26.64-105.08-21.12-29.91-98.87,17.95-229.2,13.35C1346.28,981.89,1246.67,969.48,1241.11,936.48Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-27)" />
                                <path
                                    d="M1220.68,1576.41a18.3,18.3,0,0,1-2.27,1.06c-5.08,2.23-16.62,7.65-20.18,21.33-4.35,16.75,8.62,45.71,25.45,79.83s23.55-4.18,23.35-10.24-7.74-86.86-7.74-86.86Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-28)" />
                                <path d="M1264.59,1584.7l-41.47,16s-9-5.26-1.41-17.08l19-29.69Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-29)" />
                                <path
                                    d="M1358.84,848.6a842.89,842.89,0,0,1,80.8-28.43c6,17.87,14.81,28.1,23.06,34.09,37.87,27.53,83.32-13.85,158.2,7.61,19.14,5.49,71.66,20.54,88,61,19.55,48.32-34.12,79.46-34.2,174.08,0,49.09,14.38,52.84,6,86.81-13.32,53.64-54,63.43-66.19,110.28-3.21,12.38-4.46,28.43-.32,48.38-7.31,6.76-14.4,13.09-20.89,18.53l-34.87-36.39c4.91-48.2,11.17-88.14,16.36-117.27,7.67-43.09,14.59-81.93,28.7-131.72,22.34-78.85,36.2-91.56,26.64-105.08-21.12-29.91-98.87,17.95-229.2,13.35-54.63-1.93-154.24-14.34-159.8-47.34C1235,900.34,1344.3,854.68,1358.84,848.6Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-30)" />
                                <path
                                    d="M1208.81,827.66c53.89,11.44,241.07,58.07,334.49,227.2,10.64,19.27,31.1,57,37.63,103.54,21.17,150.67-113.88,320.67-323.13,439.24l-30.75-44.08c7-40.84,22.4-99.55,60.74-158.78,51.63-79.75,104.76-98.54,109.89-156.81,5.89-67.09-57.39-123.6-69.44-133.91-89.46-76.51-185.32-27-263.64-97.85C1024,969.52,1008.48,918.93,1002,878.8Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-31)" />
                                <path
                                    d="M1358.55,648.56c-2,.29-10.62,2.42-16.76,37.35-14.82,84.22,26.62,122.1,12.06,167.25-14,43.34-68.94,60.52-125.52,78.2-37.81,11.81-154.76,48.35-216.56-8.18-26-23.8-27-50.09-39.09-147.43-30.83-247.31-36-265.24-23.28-320.74,22.06-96.56,143.73-117.24,160.4-122.18,177.76-52.67,371.65,85.73,440.91,232.47,9.12,19.32,63.59,134.71,15,183.49-29.43,29.51-91.66,29.69-130.72,4.84C1382.74,720.43,1377,645.85,1358.55,648.56Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-32)" />
                                <path
                                    d="M1541.89,728a4.07,4.07,0,0,0,1.64-.22,3.9,3.9,0,0,0,2.33-5c-1.22-3.35-30.71-82.59-110.56-119.31a3.9,3.9,0,0,0-3.26,7.08c76.81,35.32,106.2,114.1,106.49,114.89A3.89,3.89,0,0,0,1541.89,728Z"
                                    transform="translate(395.3 1351.12)"
                                    style="opacity:0.4;mix-blend-mode:multiply;fill:url(#linear-gradient-33)" />
                                <path
                                    d="M1027.61,501.61c7.05,11.21,11,24.52,14.85,37.22,5.29,17.29,14,32,33.51,34.44,22.7,2.84,46.51-1.89,68.93,3.7,11,2.75,22.45,10.73,27.83,21.09,29.47,56.74-55,139.19-25.48,172.08,13.43,15,31.65-1.38,73.4,11.73,59.45,18.67,73.82,68,102.57,63,9-1.58,20.42-8.76,31.43-32.8,2.84,14.06,3.67,27.25-.8,41.11-14,43.34-68.94,60.52-125.52,78.2-37.81,11.81-154.76,48.35-216.56-8.18-26-23.8-27-50.09-39.09-147.43-30.82-247.29-40.46-224.26-15.11-275.23,3.18-6.41,5-13.38,9.29-18.19,12.15-13.73,34.47-5.33,46.72,3.79A56.34,56.34,0,0,1,1027.61,501.61Z"
                                    transform="translate(395.3 1351.12)"
                                    style="opacity:0.30000000000000004;mix-blend-mode:multiply;fill:url(#linear-gradient-34)" />
                                <path
                                    d="M1235.13,306.18a29.58,29.58,0,0,0,22.57,36.21c19.92,4.16,44.21,10,54.79,15.65,19.43,10.33-58.21.09-129.31.61-44.39.33-77.69-3.63-96.44-6.65a4.93,4.93,0,0,1-.84-9.51c17.57-6.32,46.18-15.72,70.48-19.53,30.08-4.73,60.42-72.38,60.42-72.38l26.61,22.72Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-35)" />
                                <path
                                    d="M1446.49,619.65l-3-5.88a24.1,24.1,0,0,0-24.76-19.87l-18.2.78a9.73,9.73,0,0,0-9.23,11c1,8.18,4.58,18.15,15.72,18.29,18.91.23,28.75,28.61,28.75,28.61l8-9.59A21.3,21.3,0,0,0,1446.49,619.65Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-36)" />
                                <polygon
                                    points="1566.79 2022.38 1606.85 1793.94 1787.93 1863.36 1741.88 2092.3 1566.79 2022.38"
                                    style="fill:url(#linear-gradient-37)" />
                                <polygon
                                    points="1888.2 1787.42 1787.93 1863.36 1741.88 2092.3 1815.69 2043.61 1888.2 1787.42"
                                    style="fill:url(#linear-gradient-38)" />
                                <path
                                    d="M1188.48,279.57s36.08,41,91.16,27.54c49.33-12,36.92-125.21.87-143.35-12-6-33.9-5.58-50.36,2.32-9.72,4.67-12.43,9.53-28.46,16.85-14.79,6.74-19.47,5.8-23.46,10.56-5,5.95-7.14,18.78,8.39,49.77-11.21-8-23.29-9.65-30.71-4.4a17.28,17.28,0,0,0-5.51,7.64C1145.68,260.51,1160.22,274.78,1188.48,279.57Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-39)" />
                                <path
                                    d="M1153.62,633.9l4.65-6.39a28.86,28.86,0,0,1,33.07-18.8l21.38,4.39a11.65,11.65,0,0,1,8.83,14.72c-2.78,9.48-8.87,20.6-22.07,18.64-22.42-3.32-39.45,28.38-39.45,28.38L1152.35,662A25.52,25.52,0,0,1,1153.62,633.9Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-40)" />
                                <path
                                    d="M1154,627.13c-5,3.86-55.49,41.64-111.11,22.92-48.44-16.31-74.94-66.79-77-107.65-5-97.17,126.78-167.87,112.89-188.57-8.27-12.32-59.39,6.18-93.85,23.8-35.77,18.29-132.44,67.72-161,177.6-2.42,9.33-34.7,140.47,36.76,201.4C926.79,813,1066.36,796.35,1169,683.77Q1161.51,655.45,1154,627.13Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-41)" />
                                <path
                                    d="M1427.44,658.75a45.82,45.82,0,0,0,23.3-27.39c6.4-20.22,5.37-49.92-7.94-42.62S1417.72,645.69,1427.44,658.75Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-42)" />
                                <path
                                    d="M1808.84,608.1c-9.84-13.83-51.78-45.65-55.41-37.76s9.09,10.84,10.56,19.75-21.66-5.46-49.39-11.6-14.3,15.47,15.12,34.07,59.13,29.11,62.49,29.33,34.7,25,34.7,25l13.28-27.09S1818.67,621.93,1808.84,608.1Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-43)" />
                                <path
                                    d="M2287.1,885.74c54.55,59.43,206.11,48.74,312.63,34.33,19.15-2.52,36.86-5.24,52.27-7.67,101.17-16,59.86-504.75,59-553.2-.31-18.66-14.2-26.73-40-30.86-41.18-6.56-112.62-3-207.42-16.69C2309.46,289.5,2283.23,321,2283.23,321,2272.68,343.26,2222.76,815.65,2287.1,885.74Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-44)" />
                                <path
                                    d="M2611.35,462.57c-3.83,88.19-31.54,381.17-11.62,457.5,19.15-2.52,36.86-5.24,52.27-7.67,101.17-16,59.86-504.75,59-553.2-.31-18.66-14.2-26.73-40-30.86a114.53,114.53,0,0,0-10.19,11C2601,412,2615.82,358.6,2611.35,462.57Z"
                                    transform="translate(395.3 1351.12)"
                                    style="opacity:0.5;mix-blend-mode:multiply;fill:url(#linear-gradient-45)" />
                                <path
                                    d="M2416,1735.69s2.85,22.69.94,30.29-67.89,13.09-90.29,10.45,13.34-25.52,27.61-29.81S2416,1735.69,2416,1735.69Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-46)" />
                                <path d="M2382.82,1697.83l6.95,45.53s17.74,8,26.26.09l.94-47.65Z"
                                    transform="translate(395.3 1351.12)" style="fill:#76326b" />
                                <path
                                    d="M2698.91,1695.8s-14,10.39-10.26,22.83,36.39,62.29,59.67,76.43,16-15.32,9.21-33.68-24.08-58.8-30.84-65.58S2698.91,1695.8,2698.91,1695.8Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-47)" />
                                <path
                                    d="M2673.73,1645.78c6.77,18.86,13.28,34.37,18.37,45.81,11.26,25.31,17.42,34.8,24.39,43,6.08,7.17,20.47,22.47,24.34,19.93s-6.6-21.19-26.89-75.67c-3-7.9-12.26-33.1-12.26-33.1h-27.95Z"
                                    transform="translate(395.3 1351.12)" style="fill:#76326b" />
                                <path
                                    d="M2244.65,857.62a1179,1179,0,0,0-2.53,210.3c9,116.36,32.3,190,61.47,314.06,17.84,75.82,41.86,187.41,63.61,327,5,2.89,19.89,10.49,39,7.65a59.11,59.11,0,0,0,23.43-8.9c57.05-174.33,40.2-282.36,12.67-349.66-11.74-28.69-26-51.33-33.57-95.43-10.06-58.35,2.38-91,20.13-226.12,12.64-96.33,10.46-111.22,2-125.67C2397.25,853.06,2294.36,854.19,2244.65,857.62Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-48)" />
                                <path
                                    d="M2385.2,877.89c35,180.49,69.25,275.28,95.21,328.9a901,901,0,0,1,48,117c17.87,54.14,25.32,94,29.14,111.49,12,55.32,41.82,136.1,121.95,242.06,1,.58,14.66,8.31,27.73,1.42a26.81,26.81,0,0,0,11.21-11.64c-10.47-101.3-22.5-186.42-32.94-252.11-2.19-13.78-11.83-74.06-27-153.71-5.92-31.17-14.59-76.84-25-123.74-12.94-58.42-32.77-137.88-63.35-233.11Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-49)" />
                                <path
                                    d="M2696.56,629.54c-11.1,48.36-27.94,117.58-49.85,223.77-22.68,109.84-26.16,139.74-58,164.47-75.6,58.81-205.55,6.52-247.57-10.4-62.86-25.31-124.7-49.88-136.66-100.54-5.53-23.31,2.71-44,11.31-68.27,7.49-21.05,18.8-44.77,18.8-75.2v0c10.27-34.81-10.57-122.16-12.45-131.34-74.54,103-148.61,139.49-213.28,143.51a202.08,202.08,0,0,1-24.85,0c-1.47-.08-3.06-.17-4.5-.29l-.1,0c-98.2-8.11-170.64-85.39-184.89-95.38-24.58-17.24,28.65-66.06,28.65-66.06l25.92,17.45c19.08,11,76,20.31,126.91-7.54a.15.15,0,0,0,.12,0c29.32-16,56.68-44.71,73.64-92.09,15.6-43.5,43.86-82.15,74.65-106.11h0c.09-3.42.17.16.29.07,43.66-38.66,92.19-61.62,116.15-71.61.24-.08.45-.12.69-.2,91.66-41.2,194.5-54.22,289.14-17.73,18.55,7.13,130.07,50.17,171.72,153.91C2717.48,527.31,2714.62,550.78,2696.56,629.54Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-50)" />
                                <path
                                    d="M2696.56,629.54c-11.1,48.36-27.94,117.58-49.85,223.77-22.68,109.84-26.16,139.74-58,164.47-75.6,58.81-205.55,6.52-247.57-10.4-62.86-25.31-124.7-49.88-136.66-100.54-5.53-23.31,1.76-44,10.36-68.27,20.4-3.77,45.34-6.72,77.65-1.11,52.55,9.17,66.92,31,88,25.23,46.24-12.61-17.9-119.1,37.52-151,46.72-26.91,132.85,25.64,169.87-5.16,25.89-21.46-4.67-56.52,16.79-77.12,11.23-10.77,35.59-16.5,86.79-7.33C2693.2,624.54,2694.88,627,2696.56,629.54Z"
                                    transform="translate(395.3 1351.12)"
                                    style="opacity:0.45;mix-blend-mode:multiply;fill:url(#linear-gradient-51)" />
                                <path
                                    d="M2327.41,165.79c-3-15.84-14.7-16.28-17.2-31-3.14-18.42,11.34-40.45,29.24-49.89,17.53-9.24,25.44.38,63.65,0,41.05-.4,47.43-11.66,80.85-6.88,8.73,1.25,25,3.73,43,13.76,14.35,8,42.82,23.87,46.44,53.33,4,32.21-24.76,56.25-27.52,58.49,10.86,37.38,6.23,53.23-1.72,60.21,0,0-8.44,7.4-51.61,6.88h0s-12.18,15.14-19.27,20.2c-8.07,5.75-23.76,8.57-57.57-7.5a225.59,225.59,0,0,0-4.47-29.81c-5-22.92-7.52-34.39-13.87-36.56-16-5.46-37.4,50.53-59.06,46.41-13.92-2.65-24.76-29.54-22.94-51.23S2330.85,183.8,2327.41,165.79Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-52)" />
                                <path
                                    d="M2390.34,294.22a33.81,33.81,0,0,1-29,39.21c-23.08,2.94-51.3,7.39-63.88,12.85-23.08,10,66.33,5.41,147.33,12.48,50.56,4.42,88.87,2.94,110.52,1.21a5.64,5.64,0,0,0,1.83-10.77c-19.46-8.81-42.33-22.25-69.68-28.81-33.86-8.13-71.15-87.86-71.15-87.86L2383.9,256Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-53)" />
                                <path
                                    d="M2443.47,275.51s-34.55,39.23-87.28,26.36c-47.22-11.52-35.34-119.87-.83-137.23,11.51-5.79,32.45-5.34,48.21,2.22,9.3,4.47,11.9,9.12,27.25,16.13,14.16,6.46,18.64,5.55,22.45,10.11,4.77,5.7,6.84,18-8,47.65,10.74-7.63,22.3-9.24,29.41-4.21a16.57,16.57,0,0,1,5.27,7.31C2484.44,257.26,2470.52,270.92,2443.47,275.51Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-54)" />
                                <path
                                    d="M2606.14,338.7s-108.58-49.44-117.9,59.25,63.59,363.56,150.7,376.9c25.26-46.59,12.35-71.1-15.6-99.77s-127.59-277.24-12.68-298.29l16.5,1.93S2640.31,359.47,2606.14,338.7Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-55)" />
                                <path
                                    d="M2333.74,324.49s-130.51,119-104,357.51c0,0-85.92-139.91-37.34-273.36C2224.52,320.39,2313.18,295.67,2333.74,324.49Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-56)" />
                                <path
                                    d="M2255.52,541.78c-9.34,0-14.07,4.25-14.07,13.3V788.52c0,9.05,4.73,16.72,14.07,16.72H2439.9V541.78Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-57)" />
                                <path d="M2246,542.8c-3.82,0-4.59,3.09-4.59,6.91v87.87h200.12l.23-98.33Z"
                                    transform="translate(395.3 1351.12)" style="fill:#fff" />
                                <path
                                    d="M2240.9,548.62c-9.05,0-13.14,5.6-13.14,14.65V796.71c0,9,4.09,15.38,13.14,15.38h175V548.62Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-58)" />
                                <polygon
                                    points="2835.2 2155.51 2811.25 2164.22 2811.25 1898.02 2835.2 1889.82 2835.2 2155.51"
                                    style="fill:url(#linear-gradient-59)" />
                                <path
                                    d="M2453.54,667.41c5.34,4.85,59.45,52.51,124.55,36.24,56.69-14.18,91.5-69.29,97.6-115.67,14.5-110.3-96.89-181.39-79.17-203.71,10.55-13.29,34.81-9,72.48,14.18,39.1,24.1,144.77,89.24,167.29,217.07,1.92,10.86,26.77,163.26-60.24,226.2-80.44,58.2-238,26.54-344.71-111.11Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-60)" />
                                <path
                                    d="M2453.39,675.16l-4.72-7.71a33,33,0,0,0-36-24.44l-24.77,3.06a13.33,13.33,0,0,0-11.4,16c2.3,11.05,8.24,24.28,23.46,23.26,25.85-1.75,42.38,35.93,42.38,35.93l9.93-14A29.19,29.19,0,0,0,2453.39,675.16Z"
                                    transform="translate(395.3 1351.12)" style="fill:url(#linear-gradient-61)" />
                            </g>
                        </g>
                    </svg>
                    <div class="w-full max-w-md mx-auto xl:max-w-xl">
                        <h3 class="text-2xl font-bold text-center text-base-content">
                            Help others with your course review
                        </h3>
                        <p class="leading-relaxed text-center text-base-content/50 mt-2.5">
                            Your honest feedback can make a difference in someone's education journey.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
