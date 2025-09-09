<x-mail::message>
   <p>Click the link below to reset your password:</p>
   <a href="{{ url('/reset-password/' . $token) }}">Reset Password</a>  
   <br> 
   **C2CRides**
</x-mail::message>