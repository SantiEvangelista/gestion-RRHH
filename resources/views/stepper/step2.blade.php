@extends('layout')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: "Inter", sans-serif;
    }
    .formbold-main-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      width: 100%;
    }
  
    .formbold-form-wrapper {
      margin: 0 auto;
      max-width: 650px;
      width: 100%;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
  
    .formbold-steps {
      padding-bottom: 18px;
      margin-bottom: 35px;
      border-bottom: 1px solid #DDE3EC;
    }
    .formbold-steps ul {
      padding: 0;
      margin: 0;
      list-style: none;
      display: flex;
      gap: 20px;
      justify-content: center;
    }
    .formbold-steps li {
      display: flex;
      align-items: center;
      gap: 8px;
      font-weight: 500;
      font-size: 14px;
      line-height: 20px;
      color: #536387;
    }
    .formbold-steps li span.step-number {
      display: flex;
      align-items: center;
      justify-content: center;
      background: #DDE3EC;
      border-radius: 50%;
      width: 28px;
      height: 28px;
      font-weight: 500;
      font-size: 14px;
      line-height: 20px;
      color: #536387;
    }
    .formbold-steps li.active {
      color: #07074D;
    }
    .formbold-steps li.active span.step-number {
      background: #6A64F1;
      color: #FFFFFF;
    }
  
    .formbold-input-flex {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-bottom: 22px;
    }
    .formbold-input-flex > div {
      flex: 1 1 250px;
      min-width: 0;
    }
    .formbold-form-input {
      width: 100%;
      padding: 13px 22px;
      border-radius: 5px;
      border: 1px solid #DDE3EC;
      background: #FFFFFF;
      font-weight: 500;
      font-size: 16px;
      color: #536387;
      outline: none;
      resize: none;
    }
    .formbold-form-input:focus {
      border-color: #6a64f1;
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }
    .formbold-form-label {
      color: #07074D;
      font-weight: 500;
      font-size: 14px;
      line-height: 24px;
      display: block;
      margin-bottom: 10px;
    }
  
    .formbold-form-btn-wrapper {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      gap: 15px;
      margin-top: 25px;
    }

    .formbold-left-buttons {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .formbold-clear-btn {
      cursor: pointer;
      background: #FFFFFF;
      border: none;
      color: #DC3545;
      font-weight: 500;
      font-size: 16px;
      line-height: 24px;
      display: flex;
      align-items: center;
      gap: 5px;
      padding: 8px 16px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .formbold-clear-btn:hover {
      background-color: #fee2e2;
    }

    .formbold-back-btn {
      cursor: pointer;
      background: #FFFFFF;
      border: none;
      color: #07074D;
      font-weight: 500;
      font-size: 16px;
      line-height: 24px;
      display: flex;
      align-items: center;
      gap: 5px;
      white-space: nowrap;
    }
    .formbold-btn {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 16px;
      border-radius: 5px;
      padding: 10px 25px;
      border: none;
      font-weight: 500;
      background-color: #6A64F1;
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      white-space: nowrap;
    }
    .formbold-btn:hover {
      background-color: #5753e4;
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    .text-danger {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    }

    .formbold-form-input.error {
        border-color: #dc3545;
    }

    .formbold-form-input.error:focus {
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .education-section {
        margin-bottom: 30px;
    }

    .education-section h3 {
        margin-bottom: 20px;
        color: #07074D;
        font-size: 18px;
    }

    .formbold-steps li span.step-text {
      display: inline;
    }

    @media (max-width: 576px) {
      .formbold-main-wrapper {
        padding: 15px;
      }
      
      .formbold-form-wrapper {
        padding: 15px;
      }

      .formbold-input-flex > div {
        width: 100%;
      }

      .formbold-form-btn-wrapper {
        flex-direction: column-reverse;
        align-items: stretch;
      }

      .formbold-left-buttons {
        justify-content: center;
      }

      .formbold-btn {
        width: 100%;
        justify-content: center;
      }

      .education-section h3 {
        font-size: 16px;
      }

      .formbold-steps li:not(.active) span.step-text {
        display: none;
      }

      .formbold-steps li.active span.step-text {
        display: inline;
      }

      .formbold-steps ul {
        gap: 12px;
      }
    }
</style>
@endsection

@section('body')
    @include('components.switch-languaje')

    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <form action="{{ route('generador.paso2.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="formbold-steps">
                    <ul>
                        <li>
                            <span class="step-number">1</span>
                            <span class="step-text">{{ __('stepper.steps.personal_info') }}</span>
                        </li>
                        <li class="active">
                            <span class="step-number">2</span>
                            <span class="step-text">{{ __('stepper.steps.education') }}</span>
                        </li>
                        <li>
                            <span class="step-number">3</span>
                            <span class="step-text">{{ __('stepper.steps.experience') }}</span>
                        </li>
                    </ul>
                </div>

                <div class="education-section">
                    <h3>{{ __('stepper.education.secondary.title') }}</h3>
                    <div class="formbold-input-flex">
                        <div>
                            <label for="secundario" class="formbold-form-label">{{ __('stepper.education.secondary.school') }}</label>
                            <input type="text" 
                                name="secundario" 
                                id="secundario" 
                                class="formbold-form-input @error('secundario') error @enderror"
                                value="{{ old('secundario', $sessionData->secundario ?? '') }}"
                                placeholder="{{ __('stepper.placeholders.school') }}" 
                                required>
                            @error('secundario')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="orientacion" class="formbold-form-label">{{ __('stepper.education.secondary.orientation') }}</label>
                            <input type="text" 
                                name="orientacion" 
                                id="orientacion" 
                                class="formbold-form-input @error('orientacion') error @enderror"
                                value="{{ old('orientacion', $sessionData->orientacion ?? '') }}"
                                placeholder="{{ __('stepper.placeholders.orientation') }}" 
                                required>
                            @error('orientacion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="formbold-input-flex">
                        <div>
                            <label for="fecha_inicio_secundario" class="formbold-form-label">{{ __('stepper.education.secondary.start_date') }}</label>
                            <input type="date" 
                                name="fecha_inicio_secundario" 
                                id="fecha_inicio_secundario" 
                                class="formbold-form-input @error('fecha_inicio_secundario') error @enderror"
                                value="{{ old('fecha_inicio_secundario', $sessionData->fecha_inicio_secundario ?? '') }}"
                                required>
                            @error('fecha_inicio_secundario')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="fecha_fin_secundario" class="formbold-form-label">{{ __('stepper.education.secondary.end_date') }}</label>
                            <input type="date" 
                                name="fecha_fin_secundario" 
                                id="fecha_fin_secundario" 
                                class="formbold-form-input"
                                value="{{ old('fecha_fin_secundario', $sessionData->fecha_fin_secundario ?? '') }}">
                        </div>
                    </div>
                </div>

                <div class="education-section">
                    <h3>{{ __('stepper.education.tertiary.title') }}</h3>
                    <div class="formbold-input-flex">
                        <div>
                            <label for="terciaria" class="formbold-form-label">{{ __('stepper.education.tertiary.school') }}</label>
                            <input type="text" 
                                name="terciaria" 
                                id="terciaria" 
                                class="formbold-form-input @error('terciaria') error @enderror"
                                value="{{ old('terciaria', $sessionData->terciaria ?? '') }}"
                                placeholder="{{ __('stepper.placeholders.school') }}" 
                                required>
                            @error('terciaria')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="orientacion_terciaria" class="formbold-form-label">{{ __('stepper.education.tertiary.orientation') }}</label>
                            <input type="text" 
                                name="orientacion_terciaria" 
                                id="orientacion_terciaria" 
                                class="formbold-form-input @error('orientacion_terciaria') error @enderror"
                                value="{{ old('orientacion_terciaria', $sessionData->orientacion_terciaria ?? '') }}"
                                placeholder="{{ __('stepper.placeholders.orientation') }}" 
                                required>
                            @error('orientacion_terciaria')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="formbold-input-flex">
                        <div>
                            <label for="fecha_inicio_terciaria" class="formbold-form-label">{{ __('stepper.education.tertiary.start_date') }}</label>
                            <input type="date" 
                                name="fecha_inicio_terciaria" 
                                id="fecha_inicio_terciaria" 
                                class="formbold-form-input @error('fecha_inicio_terciaria') error @enderror"
                                value="{{ old('fecha_inicio_terciaria', $sessionData->fecha_inicio_terciaria ?? '') }}"
                                required>
                            @error('fecha_inicio_terciaria')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="fecha_fin_terciaria" class="formbold-form-label">{{ __('stepper.education.tertiary.end_date') }}</label>
                            <input type="date" 
                                name="fecha_fin_terciaria" 
                                id="fecha_fin_terciaria" 
                                class="formbold-form-input"
                                value="{{ old('fecha_fin_terciaria', $sessionData->fecha_fin_terciaria ?? '') }}">
                        </div>
                    </div>
                </div>

                <div class="formbold-form-btn-wrapper">
                    <div class="formbold-left-buttons">
                        <a href="{{ route('generador.clearSession') }}" class="formbold-clear-btn">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.3334 4L12.3934 4.94L11.4534 4L10.5134 4.94L9.57341 4L8.63341 4.94L7.69341 4L6.75341 4.94L5.81341 4L4.87341 4.94L3.93341 4L3 4.94V13.3333H13.3334V4ZM5.81341 11.3333H4.87341V9.45333H5.81341V11.3333ZM8.63341 11.3333H7.69341V9.45333H8.63341V11.3333ZM11.4534 11.3333H10.5134V9.45333H11.4534V11.3333Z" fill="#DC3545"/>
                            </svg>
                            {{ __('stepper.buttons.clear') }}
                        </a>
                        <a href="{{ route('generador.paso1.create') }}" class="formbold-back-btn">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.21875 7.33312L8.79475 3.75712L7.85208 2.81445L2.66675 7.99979L7.85208 13.1851L8.79475 12.2425L5.21875 8.66645H13.3334V7.33312H5.21875Z" fill="#07074D"/>
                            </svg>
                            {{ __('stepper.buttons.back') }}
                        </a>
                    </div>
                    <button type="submit" class="formbold-btn">
                        {{ __('stepper.buttons.next') }}
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1675_1807)">
                                <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_1675_1807">
                                    <rect width="16" height="16" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


