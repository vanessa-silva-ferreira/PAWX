<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentNotification extends Notification
{
    use Queueable;

    protected $appointmentDetails;

    /**
     * Create a new notification instance.
     */
    public function __construct($appointmentDetails)
    {
        $this->appointmentDetails = $appointmentDetails;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Appointment Confirmation')
            ->line('Your appointment has been confirmed!')
            ->line('Date: ' . $this->appointmentDetails['appointment_date'])
            ->line('Status: ' . $this->appointmentDetails['status'])
            ->action('View Appointment', url('/appointments/' . $this->appointmentDetails['id']))
            ->line('Thank you for choosing our service!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'appointment_id' => $this->appointmentDetails['id'],
            'date' => $this->appointmentDetails['appointment_date'],
            'status' => $this->appointmentDetails['status'],
            'message' => 'Your appointment is scheduled!',
        ];
    }
}
