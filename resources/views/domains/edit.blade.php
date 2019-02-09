@extends('layouts.app')

@section('content')
  <div class="sq-card">
    <div class="sq-card-header">
      <p>{{ $domain->domain }}<br><span style="font-size:1rem;">These settings will define how any squished links that use this domain will be handled.</span></p>

      <button v-if="shouldSave" href="{{ route('domains.update', $domain->id) }}" class="sq-button sq-is-success">Save Changes</button>
    </div> <!-- end of .sq-card-header -->
    <div class="sq-card-body">
      <sq-input placeholder="MyDomain.com" label="Domain" type="text" v-model="domain.domain" :validate="validationRules.domain"></sq-input>
      <hr>
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
          return !_.isEqual(this.domain, this.original)
        }
      }
    })
  </script>
@endpush