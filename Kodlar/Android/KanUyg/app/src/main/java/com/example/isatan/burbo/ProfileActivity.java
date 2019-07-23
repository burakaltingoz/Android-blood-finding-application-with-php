package com.example.isatan.burbo;

import android.Manifest;
import android.app.Activity;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AlertDialog;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONObject;

import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

public class ProfileActivity extends Activity implements LocationListener,View.OnClickListener {

    //Textview to show currently logged in user
    private TextView textView;
    private Button b1, b2, b3;
    private LocationManager locationManager;

    public static final String REGISTER_URL = "http://burakaltingoz.xyz/enboy.php"; //değişecek
    public static final String KEY_ENLEM = "enlem";
    public static final String KEY_BOYLAM = "boylam";
    public static final String KEY_EMAIL = "email";
    public static final String TAG = ProfileActivity.class.getSimpleName();

    private RequestQueue mRequestQueue;

    private static ProfileActivity mInstance;


    private TextView tv_latitude;
    private TextView tv_longitude;

    String ad = "";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(com.example.isatan.burbo.R.layout.activity_profile);
        b1 = (Button) findViewById(R.id.buttonliste);
        b2 = (Button) findViewById(R.id.buttoncikis);
        b3 = (Button) findViewById(R.id.butoncagri);
        b1.setOnClickListener(this);
        b2.setOnClickListener(this);
        b3.setOnClickListener(this);


        //Initializing textview





        textView = (TextView) findViewById(com.example.isatan.burbo.R.id.textView);

        //Fetching email from shared preferences
        SharedPreferences sharedPreferences = getSharedPreferences(Config.SHARED_PREF_NAME, Context.MODE_PRIVATE);
        String email = sharedPreferences.getString(Config.EMAIL_SHARED_PREF, "Geçersiz Email");

        //Showing the current logged in email to textview
        textView.setText("Kullanıcı : " + email);
        mInstance = this;
        tv_latitude = (TextView) findViewById(com.example.isatan.burbo.R.id.tv_latitude);
        tv_longitude = (TextView) findViewById(com.example.isatan.burbo.R.id.tv_longitude);

        /********** get Gps location service LocationManager object ***********/
        locationManager = (LocationManager) getSystemService(Context.LOCATION_SERVICE);

                /* CAL METHOD requestLocationUpdates */

        // Parameters :
        //   First(provider)    :  the name of the provider with which to register
        //   Second(minTime)    :  the minimum time interval for notifications,
        //                         in milliseconds. This field is only used as a hint
        //                         to conserve power, and actual time between location
        //                         updates may be greater or lesser than this value.
        //   Third(minDistance) :  the minimum distance interval for notifications, in meters
        //   Fourth(listener)   :  a {#link LocationListener} whose onLocationChanged(Location)
        //                         method will be called for each location update


        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            return;
        }

        if (locationManager.isProviderEnabled(LocationManager.NETWORK_PROVIDER) && locationManager.isProviderEnabled(LocationManager.GPS_PROVIDER)) {
            locationManager.requestLocationUpdates(LocationManager.NETWORK_PROVIDER, 3000, 10, this);
            locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 3000, 10, this);
        }
       // locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 3000, 10, this);
        //locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 0, 0, this);
        //locationManager.requestLocationUpdates(LocationManager.NETWORK_PROVIDER, 0, 0, this);
        /********* After registration onLocationChanged method  ********/
        /********* called periodically after each 3 sec ***********/
    }


    //Logout function
    private void logout(){
        //Creating an alert dialog to confirm logout
        AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(ProfileActivity.this);
        alertDialogBuilder.setTitle("Çıkış");
        alertDialogBuilder.setMessage("Çıkış yapmak istediğinize emin misiniz?");
        alertDialogBuilder.setPositiveButton("Evet",new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface arg0, int arg1) {

                //Getting out sharedpreferences
                SharedPreferences preferences = getSharedPreferences(Config.SHARED_PREF_NAME, Context.MODE_PRIVATE);
                //Getting editor
                SharedPreferences.Editor editor = preferences.edit();

                //Puting the value false for loggedin
                editor.putBoolean(Config.LOGGEDIN_SHARED_PREF, false);

                //Putting blank value to email
                editor.putString(Config.EMAIL_SHARED_PREF, "");

                //Saving the sharedpreferences
                editor.apply();

                //Starting login activity
                Intent intent = new Intent(ProfileActivity.this, MainActivity.class);
                startActivity(intent);
            }
        }).show();

        alertDialogBuilder.setNegativeButton("Hayır",new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface arg0, int arg1) {

            }
        }).show();

        //Showing the alert dialog
        AlertDialog alertDialog = alertDialogBuilder.create();
        alertDialog.show();
        // alertDialogBuilder.show();

    }

    /************* Called after each 3 sec **********/
    @Override
    public void onLocationChanged(Location location) {

        String lat1=(Double.toString(location.getLatitude()));
        String lon1=(Double.toString(location.getLongitude()));
        final String lat = lat1;
        final String lon = lon1;
        final SharedPreferences sharedPreferences = getSharedPreferences(Config.SHARED_PREF_NAME, Context.MODE_PRIVATE);
        final String email = sharedPreferences.getString(Config.EMAIL_SHARED_PREF, "Geçersiz Email");

        tv_latitude.setText(lat1);
        tv_longitude.setText(lon1);
        Log.e("WEBIS","lat "+lat1);
        Log.e("WEBIS","lot "+lon1);


        StringRequest stringRequest = new StringRequest(Request.Method.POST, REGISTER_URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {
                            JSONObject object=new JSONObject(response);
                            Iterator<String> iter = object.keys();
                            while (iter.hasNext()) {
                                String key = iter.next();

                                if(key.equals("olumlu"))
                                {

                                    String olumlu=object.getString("olumlu");
                                    Toast.makeText(ProfileActivity.this,olumlu, Toast.LENGTH_LONG).show();
                                    finish();
                                }
                                else if(key.equals("olumsuz"))
                                {
                                    String olumsuz=object.getString("olumsuz");
                                    Toast.makeText(ProfileActivity.this,olumsuz, Toast.LENGTH_LONG).show();
                                }
                            }
                        } catch (Throwable t) {
                            Log.e("My App", "Could not parse malformed JSON: \"" + response + "\"");
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(ProfileActivity.this, error.toString(), Toast.LENGTH_LONG).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<String, String>();
                params.put(KEY_ENLEM, lat);
                params.put(KEY_BOYLAM, lon);
                params.put(KEY_EMAIL, email);
                return params;
            }

        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

    }

    public static synchronized ProfileActivity getInstance() {

        return mInstance;
    }

    public RequestQueue getRequestQueue() {
        if (mRequestQueue == null) {
            mRequestQueue = Volley.newRequestQueue(getApplicationContext());
        }

        return mRequestQueue;
    }


    public <T> void addToRequestQueue(Request<T> req, String tag) {
        // set the default tag if tag is empty
        req.setTag(TextUtils.isEmpty(tag) ? TAG : tag);
        getRequestQueue().add(req);
    }

    public <T> void addToRequestQueue(Request<T> req) {
        req.setTag(TAG);
        getRequestQueue().add(req);
    }

    public void cancelPendingRequests(Object tag) {
        if (mRequestQueue != null) {
            mRequestQueue.cancelAll(tag);
        }
    }

    @Override
    public void onProviderDisabled(String provider) {

        /******** Called when User off Gps *********/

        Toast.makeText(getBaseContext(), "Gps kapalı ", Toast.LENGTH_LONG).show();
    }

    @Override
    public void onProviderEnabled(String provider) {

        /******** Called when User on Gps  *********/

        Toast.makeText(getBaseContext(), "Gps açık ", Toast.LENGTH_LONG).show();
    }

    @Override
    public void onStatusChanged(String provider, int status, Bundle extras) {
        // TODO Auto-generated method stub

    }


    @Override
    public void onClick(View v) {
        final Activity activity = this;
        if (v.getId()== R.id.buttonliste){
            Intent intent = new Intent(ProfileActivity.this, ListActivity.class);
            startActivity(intent);
        }
        else if (v.getId()== R.id.buttoncikis){
            logout();
        }
        else if (v.getId() == R.id.butoncagri){
            Intent intent = new Intent(ProfileActivity.this, CagriActivity.class);
            startActivity(intent);
        }

    }
}
