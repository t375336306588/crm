@extends('layouts.app')


@section('content')
<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Оставить заявку</h5>
        </div>
        <div class="card-body">
            <form id="feedback-form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Ваш Email</label>
                    <input type="email" name="customer_email" class="form-control" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Ваше Имя</label>
                    <input type="text" name="customer_name" class="form-control" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Телефон</label>
                    <input type="tel" name="phone" class="form-control" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Тема</label>
                    <input type="text" name="subject" class="form-control" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Сообщение</label>
                    <textarea name="message" class="form-control" rows="3" ></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Прикрепить файл</label>
                    <input type="file" name="attachment" class="form-control">
                </div>

                <button type="submit" id="submit-btn" class="btn btn-primary w-100">Отправить</button>
            </form>
            <div id="response-message" class="mt-3 d-none"></div>
        </div>
    </div>
</div>
@endsection
