<template>
  <div class="timezone-style">
    <a
      href="javascript:void(0)"
      @click="openSettings"
      id="setTimeZone"
      data-target="timeZoneSettings"
      style="display: inline; float: right;"
    >
      <span>Set Time Zone</span>
    </a>
    <div class="time-toggle" id="timeZoneSettings" :style="open">
      <div class="time-setting mb-1">
        <div class="dropdown-new time-extra" @click="openTimeFormat">
          <div class="select">
            <span class="holder" v-text="timeFormatLabel"></span>
            <i class="fas fa-chevron-left"></i>
          </div>
          <input type="hidden" name="sort" />
          <ul class="dropdown-menu-new time-extra-new" :style="timeFormatOpen">
            <li
              v-for="(timeformat, key) in timeFormats"
              :value="timeformat.key"
              :class="{'active': (timeformat.key == settings.timeFormat)}"
              v-text="timeformat.value"
              v-bind:key="key"
              @click="setTimeFormat(key)"
            ></li>
          </ul>
        </div>
        <div
          class="dropdown-new sig-drop"
          style="position: relative;top: 0px;padding-top: 2px;padding-bottom: 2px;"
          @click="openTimeZoneList"
        >
          <div class="select">
            <span
              class="holder"
              style="display: block;width: 100%;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"
              v-text="timezoneLabel"
            ></span>
            <i class="fas fa-chevron-left" style="position: absolute;top: 6px; right: 5px;"></i>
          </div>
          <input type="hidden" name="sort" />
          <ul
            class="dropdown-menu-new sig-drop-new"
            style="width: 430px;height: 300px;overflow-y: auto;"
            :style="timezoneOpen"
          >
            <li
              v-for="(timezone, key) in timezones"
              :key="key"
              :value="timezone.key"
              :class="{'active': (timezone.key == settings.timezone)}"
              v-text="timezone.value"
              @click="setTimeZone(key)"
            ></li>
          </ul>
        </div>
        <button
          style
          href="javascript:void(0)"
          class="btn-saved ml-1"
          id="saveSetting"
          @click="saveSetting"
        >
          <span>Save Settings</span>
        </button>
      </div>
    </div>
    <modal :message="message" />
  </div>
</template>

<script>
  import modal from './../Modal/Message.vue'
export default {
    components: {
        modal
    },
    data() {
        return {
            open: 'display: none',
            timezoneOpen: 'display: none',
            timezoneLabel: 'Set Time zone',
            timezones: [{
                    key: 'Asia/Dhaka',
                    value: 'Reset Setting'
                },
                {
                    key: 'Kwajalein',
                    value: 'Eniwetok, Kwajalein'
                },
                {
                    key: 'Pacific/Midway',
                    value: 'Midway Island'
                },
                {
                  key: 'America/Adak',
                  value: 'Hawaii'
                },
                {
                  key: 'America/Anchorage',
                  value: 'Alaska'
                },
                {
                  key: 'America/Vancouver',
                  value: 'Pacific Time (US & Canada)'
                },
                {
                  key: 'America/Denver',
                  value: 'Mountain Time (US & Canada)'
                },
                {
                  key: 'America/Chicago',
                  value: 'Central Time (US & Canada), Mexico City'
                },
                {
                  key: 'America/New_York',
                  value: 'Eastern Time (US & Canada), Bogota, Lima'
                },
                {
                    key: 'America/Caracas',
                    value: 'Caracas'
                },
                {
                    key: 'Canada/Atlantic',
                    value: 'Atlantic Time (Canada), La Paz, Santiago'
                },
                {
                    key: 'Canada/Newfoundland',
                    value: 'Newfoundland'
                },
                {
                    key: 'America/Buenos_Aires',
                    value: 'Brazil, Buenos Aires, Georgetown'
                },
                {
                    key: 'Atlantic/Stanley',
                    value: 'Mid-Atlantic'
                },
                {
                    key: 'Atlantic/Azores',
                    value: 'Azores, Cape Verde Islands'
                },
                {
                    key: 'UTC',
                    value: 'Western Europe Time, London, Lisbon, Casablanca'
                },
                {
                    key: 'Europe/Brussels',
                    value: 'Brussels, Copenhagen, Madrid, Paris'
                },
                {
                    key: 'Asia/Jerusalem',
                    value: 'South Africa, Jerusalem, Kaliningrad'
                },
                {
                    key: 'Europe/Moscow',
                    value: 'Baghdad, Riyadh, Moscow'
                },
                {
                    key: 'Asia/Tehran',
                    value: 'Tehran'
                },
                {
                    key: 'Asia/Muscat',
                    value: 'Abu Dhabi, Muscat, Baku, Tbilisi'
                },
                {
                    key: 'Asia/Kabul',
                    value: 'Kabul'
                },
                {
                    key: 'Asia/Karachi',
                    value: 'Islamabad, Karachi, Tashkent, Yekaterinburg'
                },
                {
                    key: 'Asia/Kolkata',
                    value: 'Mumbai, Kolkata, Colombo, New Delhi'
                },
                {
                    key: 'Asia/Kathmandu',
                    value: 'Kathmandu'
                },
                {
                    key: 'Asia/Dhaka',
                    value: 'Almaty, Dhaka'
                },
                {
                    key: 'Asia/Rangoon',
                    value: 'Yangon, Cocos Islands'
                },
                {
                    key: 'Asia/Jakarta',
                    value: 'Bangkok, Hanoi, Jakarta'
                },
                {
                    key: 'Asia/Hong_Kong',
                    value: 'Beijing, Perth, Singapore, Hong Kong'
                },
                {
                    key: 'Asia/Tokyo',
                    value: 'Tokyo, Seoul, Osaka, Sapporo, Yakutsk'
                },
                {
                    key: 'Australia/Darwin',
                    value: 'Adelaide, Darwin'
                },
                {
                    key: 'Pacific/Guam',
                    value: 'Eastern Australia, Guam, Vladivostok'
                },
                {
                    key: 'Asia/Vladivostok',
                    value: 'Solomon Islands'
                },
                {
                    key: 'Pacific/Auckland',
                    value: 'Auckland, Wellington, Fiji, Kamchatka'
                }
            ],
            timezone: localStorage.getItem('timezone') || null,

            settings: {
                timeFormat: 12,
                timezone: 'Asia/Dhaka'
            },

            // daylightSaving: [
            //   {
            //     key: null,
            //     value: 'Reset Setting'
            //   },
            //   {
            //     key: "on",
            //     value: "DST on"
            //   },
            //   {
            //     key: "off",
            //     value: "DST off"
            //   }
            // ],
            // dstOpen: 'display: none',
            // dstLabel: 'Set DST',
            // dst: null,

            timeFormats: [{
                    key: 24,
                    value: '24 Hours'
                },
                {
                    key: 12,
                    value: '12 Hours'
                }
            ],
            timeFormat: localStorage.getItem('timeformat') || null,
            timeFormatLabel: 'Set Formate',
            timeFormatOpen: 'display: none',
            message: {
                title: null,
                body: null
            }
        }
    },
    mounted() {

        if (localStorage.getItem("timeformat") === null) {
            localStorage.setItem("timeformat", 24)
        }

        if (localStorage.getItem("timezone") === null) {
            localStorage.setItem("timezone", 'UTC')
        }

        this.settings.timeFormat = localStorage.getItem("timeformat")
        var index = this.timeFormats.findIndex(z => z.key == localStorage.getItem("timeformat"))
        this.timeFormatLabel = this.timeFormats[index].value

        this.settings.timezone = localStorage.getItem("timezone")
        var index = this.timezones.findIndex(z => z.key == localStorage.getItem("timezone"))
        this.timezoneLabel = this.timezones[index].value
    },
    methods: {
        openSettings() {

            document.getElementById("setTimeZone").style.boxShadow = 'none'
            _.delay(() => {
                document.getElementById("setTimeZone").style.boxShadow = '0 0 5px black'
            }, 50)

            this.open = this.open == 'display: none' ? 'display: block' : 'display: none'
        },
        saveSetting() {
            document.getElementById("saveSetting").style.boxShadow = 'none'

            _.delay(() => {
                document.getElementById("saveSetting").style.boxShadow = '0 0 5px black'
            }, 50)

            localStorage.setItem("timeformat", this.timeFormat)
            localStorage.setItem("timezone", this.timezone)

            this.settings.timeFormat = this.timeFormat
            this.settings.timezone = this.timezone

            // this.$emit('timezone', this.settings)
            EventBus.$emit('timezone', this.settings)

            this.message.title = "Attention!!"
            this.message.body = "Your timezone settings has been saved in your browser. This may clear by manual action of clearing cache and/or cookie. By doing so, you need to set your timezone again."

            // $('#message-modal').modal('show')
            alert('Your timezone settings has been registered');
        },
        openTimeFormat() {
            this.timeFormatOpen = this.timeFormatOpen == 'display: none' ? 'display: block' : 'display: none'
        },
        setTimeFormat(index) {
            this.timeFormatLabel = this.timeFormats[index].value
            this.timeFormat = this.timeFormats[index].key
        },
        // openDst() {
        //   this.dstOpen = this.dstOpen == 'display: none' ? 'display: block' : 'display: none'
        // },
        // setDst(index) {
        //   this.dstLabel = this.daylightSaving[index].value
        //   this.dst = this.daylightSaving[index].key
        // },
        openTimeZoneList() {
            this.timezoneOpen = this.timezoneOpen == 'display: none' ? 'display: block' : 'display: none'
        },
        setTimeZone(index) {
            this.timezoneLabel = this.timezones[index].value
            this.timezone = this.timezones[index].key
        },
        getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
    }
}
</script>

