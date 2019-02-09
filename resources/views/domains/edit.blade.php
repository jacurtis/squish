@extends('layouts.app')

@section('content')
  <div class="sq-card">
    <div class="sq-card-header">
      <p>{{ $domain->domain }}<br><span style="font-size:1rem;">These settings will define how any squished links that use this domain will be handled.</span></p>

      <button v-if="shouldSave" href="{{ route('domains.update', $domain->id) }}" class="sq-button sq-is-success">Save Changes</button>
    </div> <!-- end of .sq-card-header -->
    <div class="sq-card-body">
      <div class="sq-notification sq-p-x-15 sq-m-b-15 sq-align-items-center sq-flex sq-justify-between" :class="{ 'sq-is-success-muted' : domainIsActive, 'sq-is-danger' : !domainIsActive }" style="padding:0.75rem 2rem;">
        <div class="notification-message">
          <strong class="sq-text-uppercase" v-text="domainStatus(domain.status)"></strong>: <span class="sq-m-l-10" v-if="domainIsActive">This domain is currently operated normally</span><span v-if="!domainIsActive">This domain is currently disabled. Activate it to immediately start using it.</span>
        </div>
        <button class="sq-button sq-is-danger sq-is-small sq-is-outlined">Disable</button>
      </div>
      <sq-input placeholder="MyDomain.com" label="Domain" type="text" v-model="domain.domain" :validate="validationRules.domain"></sq-input>
      <hr>
      <h3 style="font-size:26px">Settings</h3>
      <div class="sq-row sq-align-center sq-m-y-10">
        <div class="sq-col-4 sq-text-bold">
          Domain uses Https
        </div>
        <div class="sq-col">
          <sq-switch v-model="domain.settings.secure" name="secure"></sq-switch>
        </div>
      </div>
    </div> <!-- end of .sq-card-body -->
  </div>
@endsection

@push('scripts')
  <script>
    let app = new Vue({
      el: '#app',
      data: {
        domain: {!! $domain->toJson() !!},
        original: {!! $domain->toJson() !!},
        validationRules: {
          domain: {
            type: 'regex',
            value: /(?:[\w\-]+\.)?[\w\-]+\.[a-z]{2,}/,
            message: "Not a valid domain. Do not add http:// or https://"
          }
        }
      },
      computed: {
        shouldSave() {
          return !_.isEqual(this.domain, this.original);
        },
        domainIsActive() {
          return (this.domain.status === "active" ? true : false);
        }
      },
      methods: {
        domainStatus(status) {
          return _.capitalize(status);
        }
      }
    })
  </script>
@endpush